<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


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
            'template_type' => request('template_type'),
            'security' => request('security'),
            'performance' => request('performance'),
            'socials' => request('socials'),
            'user_id' => Auth::user()->id
        ]);

        $name = $configuration['name'];
        $template_type = $configuration['template_type'];
        $security = $configuration['security'];
        $performance = $configuration['performance'];
        $socials = $configuration['socials'];

        $process = new Process(['python3', app_path('Runner/runner.py'), $name, $template_type, $security, $performance, $socials]);
        $process->setTimeout(120);
        $process->setIdleTimeout(120);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        } else {
            return redirect()->route('configurations.index');
        }

        return redirect()->route('configurations.index');
        
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
        $configuration = Configuration::find($id);

        return view('configuration.edit', compact('configuration'));
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
