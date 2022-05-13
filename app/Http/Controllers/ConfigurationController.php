<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;
use File;
use Redirect;


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

        $configurations =  $user->configurations();

        return view('configuration.index', [
            'configurations' => $configurations->paginate(10),
        ]);

        /*
        return view('configuration.index',compact('configurations')))

        return view('configuration.index', compact('configurations'))
            ->with('i', (request()->input('page', 1) - 1) * $configurations->perPage());
*/

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

        $port_detector = new Process(['python3.9', app_path('Runner/detector.py')]);
        $port_detector->run();
        $assigned_port = $port_detector->getOutput();

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
        $username = Auth::user()->name;

        $HOME_PATH = $_ENV["HOME_PATH"];
        File::makeDirectory("".$HOME_PATH."/webspl/app/Runner/websites/".$web_name."");

        $flama = new Process(['python3.9', app_path('Runner/flama.py'), $web_name, $admin_email, $theme, $php, $storage, $catalog, $search, $paypal_payment, $creditcard_payment,$mobile_payment, $cart, $security, $backup, $seo, $twitter_socials, $facebook_socials, $youtube_socials]);
        $flama->run();

        $line = fgets(fopen( "".$HOME_PATH."/webspl/app/Runner/websites/".$web_name."/result.txt", 'r'));

        if ($line == '1') {
            $process = new Process(['python3', app_path('Runner/runner.py'), $web_name, $admin_email, $theme, $php, $storage, $catalog, $search, $paypal_payment, $creditcard_payment,$mobile_payment, $cart, $security, $backup, $seo, $twitter_socials, $facebook_socials, $youtube_socials, $username, $assigned_port]);
            $process->setTimeout(450);
            $process->setIdleTimeout(450);
            $process->run();

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
                'status' => 'DONE',
                'security' => request('security'),
                'backup' => request('backup'),
                'seo' => request('seo'),
                'twitter_socials' => request('twitter_socials'),
                'facebook_socials' => request('facebook_socials'),
                'youtube_socials' => request('youtube_socials'),
                'assigned_port' => $assigned_port,
                'user_id' => Auth::user()->id
            ]);

            return redirect()->route('configurations.index');

        } else {

            File::deleteDirectory("".$HOME_PATH."/webspl/app/Runner/websites/".$web_name."");
            return redirect('configurations/create')->with('flama', 'La configuración que ha generado no es válida.')->withInput();
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuration = Configuration::findOrFail($id);

        return view('configuration.show', compact('configuration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('configuration.show', compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Configuration $configuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Configuration::$rules);

        $configuration = Configuration::findOrFail($id);

        $configuration->update($request->all());

        return redirect()->route('configurations.index')
            ->with('success', 'Configuration updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $configuration = Configuration::find($id)->delete();

        return redirect()->route('configurations.index')
            ->with('success', 'Configuration deleted successfully');
    }
}
