<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessConfiguration;
use App\Models\Configuration;
use App\Models\User;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Redirect;
use Symfony\Component\Process\Process;

/**
 * Class ConfigurationController
 * @package App\Http\Controllers
 */
class ConfigurationController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkconfiguration', ['except' => ['index', 'create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $configurations = $user->configurations();

        return view('configuration.index', [
            'configurations' => $configurations->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configuration = new Configuration();
        return view('configuration.create', compact('configuration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Configuration::$rules);

        $password = Str::random(8);
        $username = Auth::user()->name;
        $HOME_PATH = $_ENV["HOME_PATH"];

        # Port detector
        try {

            $port_detector = new Process(['python3.9', app_path('Runner/detector.py')]);
            $port_detector->run();

            if (!$port_detector->isSuccessful()) {
                return redirect('configurations/create')->with('flama', 'We could not find a free port for your configuration, please try again later.')->withInput();
            }

            $assigned_port = $port_detector->getOutput();
        } catch (Exception $e) {

            return redirect('configurations/create')->with('flama', 'No ports are available, try again later.')->withInput();
        }

        # Object saving
        try {

            $configuration = Configuration::create([
                'web_name' => request('web_name'),
                'admin_email' => request('admin_email'),
                'theme' => request('theme'),
                'php' => request('php'),
                'storage' => request('storage'),
                'catalog' => '1',
                'search' => request('search'),
                'paypal_payment' => request('paypal_payment'),
                'creditcard_payment' => request('creditcard_payment'),
                'mobile_payment' => request('mobile_payment'),
                'cart' => '1',
                'security' => request('security'),
                'backup' => request('backup'),
                'seo' => request('seo'),
                'twitter_socials' => request('twitter_socials'),
                'facebook_socials' => request('facebook_socials'),
                'youtube_socials' => request('youtube_socials'),
                'assigned_port' => $assigned_port,
                'user_id' => Auth::user()->id,
            ]);
        } catch (Exception $e) {

            $configuration->delete();
            return redirect('configurations/create')->with('flama', 'Could not save the configuration, try again later.')->withInput();
        }

        $web_name = request('web_name');
        $admin_email = request('admin_email');
        $theme = request('theme');
        $php = request('php');
        $storage = request('storage');
        $catalog = '1';
        $cart = '1';
        $search = request('search');
        $seo = request('seo');
        $paypal_payment = request('paypal_payment');
        $creditcard_payment = request('creditcard_payment');
        $mobile_payment = request('mobile_payment');
        $security = request('security');
        $backup = request('backup');
        $twitter_socials = request('twitter_socials');
        $facebook_socials = request('facebook_socials');
        $youtube_socials = request('youtube_socials');

        # Flama validation
        try {

            File::makeDirectory("" . $HOME_PATH . "/webspl/app/Runner/websites/" . $web_name . "");

            $flama = new Process(['python3.9', app_path('Runner/flama.py'), $web_name, $admin_email, $theme, $php, $storage, $catalog, $search, $paypal_payment, $creditcard_payment, $mobile_payment, $cart, $security, $backup, $seo, $twitter_socials, $facebook_socials, $youtube_socials]);
            $flama->run();

            if (!$flama->isSuccessful()) {
                return redirect('configurations/create')->with('flama', 'Flama could not validate your configuration, please try again later.')->withInput();
            }

            # Site builder
            try {

                $line = fgets(fopen("" . $HOME_PATH . "/webspl/app/Runner/websites/" . $web_name . "/result.txt", 'r'));
                if ($line == '1') {

                    ProcessConfiguration::dispatch($configuration, $username, $password);
                } else {

                    File::deleteDirectory("" . $HOME_PATH . "/webspl/app/Runner/websites/" . $web_name . "");
                    $configuration->delete();
                    return redirect('configurations/create')->with('flama', 'The generated configuration is not valid. Please, check the following constraints:')->withInput();
                }
            } catch (Exception $e) {

                File::deleteDirectory("" . $HOME_PATH . "/webspl/app/Runner/websites/" . $web_name . "");
                File::delete("" . $HOME_PATH . "/webspl/storage/" . $username . "/" . $web_name . ".zip");
                $configuration->delete();

                return redirect('configurations/create')->with('flama', 'The configuration could not be generated, please try again later.')->withInput();
            }
        } catch (Exception $e) {

            File::deleteDirectory("" . $HOME_PATH . "/webspl/app/Runner/websites/" . $web_name . "");
            $configuration->delete();
            return redirect('configurations/create')->with('flama', 'The configuration could not be validated, please try again later.')->withInput();
        }

        return redirect()->route('configurations.index')->with('success', 'Configuration created successfully');
    }

    /**
     * Stop the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Configuration $configuration
     * @return \Illuminate\Http\Response
     */
    public function stop(Request $request, $id)
    {

        try {

            $web_name = Configuration::find($id)->web_name;
            $username = Auth::user()->name;
            $HOME_PATH = $_ENV["HOME_PATH"];

            $stopper = new Process(['python3.9', app_path('Runner/stopper.py'), $web_name]);
            $stopper->run();

            if (!$stopper->isSuccessful()) {

                return redirect()->route('configurations.index')->with('error', 'Your configuration could not be stopped, try again later.');
            }

            $configuration = Configuration::find($id);
            $configuration->status = 'PAUSED';
            $configuration->save();
        } catch (Exception $e) {

            return redirect()->route('configurations.index')->with('error', 'Your configuration could not be stopped, try again later.');
        }

        return redirect()->route('configurations.index')
            ->with('success', 'Configuration stopped successfully');
    }

    /**
     * Start the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Configuration $configuration
     * @return \Illuminate\Http\Response
     */
    public function start(Request $request, $id)
    {

        try {

            $web_name = Configuration::find($id)->web_name;
            $username = Auth::user()->name;
            $HOME_PATH = $_ENV["HOME_PATH"];

            $starter = new Process(['python3.9', app_path('Runner/starter.py'), $web_name]);
            $starter->run();

            if (!$starter->isSuccessful()) {

                return redirect()->route('configurations.index')->with('error', 'Your configuration could not be started, please try again later.');
            }

            $configuration = Configuration::find($id);
            $configuration->status = 'READY';
            $configuration->save();
        } catch (Exception $e) {

            return redirect()->route('configurations.index')->with('error', 'Your configuration could not be started, please try again later.');
        }

        return redirect()->route('configurations.index')
            ->with('success', 'Configuration started successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {

            $web_name = Configuration::find($id)->web_name;
            $username = Auth::user()->name;
            $HOME_PATH = $_ENV["HOME_PATH"];

            $destroyer = new Process(['python3.9', app_path('Runner/destroyer.py'), $web_name]);
            $destroyer->run();

            if (!$destroyer->isSuccessful()) {

                return redirect()->route('configurations.index')->with('error', 'Your configuration could not be deleted, try again later.');
            }

            File::deleteDirectory("" . $HOME_PATH . "/webspl/app/Runner/websites/" . $web_name . "");
            File::delete("" . $HOME_PATH . "/webspl/storage/app/" . $username . "/" . $web_name . ".zip");

            $configuration = Configuration::find($id)->delete();
        } catch (Exception $e) {

            return redirect()->route('configurations.index')->with('error', 'Your configuration could not be deleted, try again later.');
        }

        return redirect()->route('configurations.index')
            ->with('success', 'Configuration deleted successfully');
    }
}
