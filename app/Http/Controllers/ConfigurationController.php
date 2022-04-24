<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Storage;

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

        $web_name = request('web_name');
        
        $flama = new Process(['python3.9', app_path('Runner/flama.py'), $web_name]);
        $flama->run();

        $line = fgets(fopen("/home/joszamama/diverso-lab/WebSPL/webspl/app/Runner/outputs/".$web_name.".txt", 'r'));

        if ($line == '1') {

            $configuration = Configuration::create([
                'web_name' => request('web_name'),
                'admin_email' => request('admin_email'),
                'theme' => request('theme'),
                'php' => request('php'),
                'storage' => request('storage'),
                'catalog' => request('catalog'),
                'search' => request('search'),
                'paypal_payment' => request('paypal_payment'),
                'creditcard_payment' => request('creditcard_payment'),
                'mobile_payment' => request('mobile_payment'),
                'cart' => request('cart'),
                'security' => request('security'),
                'backup' => request('backup'),
                'seo' => request('seo'),
                'twitter_socials' => request('twitter_socials'),
                'facebook_socials' => request('facebook_socials'),
                'youtube_socials' => request('youtube_socials'),
                'user_id' => Auth::user()->id
            ]);

            $web_name = $configuration['web_name'];
            $admin_email = $configuration['admin_email'];
            $theme = $configuration['theme'];
            $php = $configuration['php'];
            $storage = $configuration['storage'];
            $catalog = $configuration['catalog'];
            $search = $configuration['search'];
            $paypal_payment = $configuration['paypal_payment'];
            $creditcard_payment = $configuration['creditcard_payment'];
            $mobile_payment = $configuration['mobile_payment'];
            $cart = $configuration['cart'];
            $security = $configuration['security'];
            $backup = $configuration['backup'];
            $seo = $configuration['seo'];
            $twitter_socials = $configuration['twitter_socials'];
            $facebook_socials = $configuration['facebook_socials'];
            $youtube_socials = $configuration['youtube_socials'];

            $process = new Process(['python3', app_path('Runner/runner.py'), $web_name, $admin_email, $theme, $php, $storage, $catalog, $search, $paypal_payment, $creditcard_payment,$mobile_payment, $cart, $security,$backup, $seo, $twitter_socials, $facebook_socials, $youtube_socials]);
            $process->setTimeout(240);
            $process->setIdleTimeout(240);
            $process->run();
        }

        if ($line == 0) {
            throw new ProcessFailedException($line);
        } else {
            return redirect()->route('configurations.index');
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
