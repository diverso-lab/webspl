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

        $configuration = Configuration::create([
            'name' => request('name'),
            'admin_email' => request('admin_email'),
            'template' => request('template'),
            'theme' => request('theme'),
            'content' => request('content'),
            'security' => request('security'),
            'performance' => request('performance'),
            'socials' => request('socials'),
            'email_server' => request('email_server'),
            'backup' => request('backup'),
            'user_id' => Auth::user()->id
        ]);

        $name = $configuration['name'];
        $admin_email = $configuration['admin_email'];
        $template = $configuration['template'];
        $theme = $configuration['theme'];
        $content = $configuration['content'];
        $security = $configuration['security'];
        $performance = $configuration['performance'];
        $socials = $configuration['socials'];
        $email_server = $configuration['email_server'];
        $backup = $configuration['backup'];

        $process = new Process(['python3', app_path('Runner/runner.py'), $name, $admin_email, $template, $theme ,$content, $security, $performance, $socials, $email_server, $backup]);
        $process->setTimeout(120);
        $process->setIdleTimeout(120);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
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
