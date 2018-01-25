<?php

namespace Dentist\Http\Controllers\Api;

use Dentist\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Dentist\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Show all clinic.
     *  @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse(Job::all());
    }
    /**
     * Creates a new clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $job = new Job();

        $job->name = $request->name;

        $job->save();

        return new JsonResponse($job);
    }
    /**
     * Updates the Clinic
     * @var Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $job->name = $request->name;

        $job->save();

        return new JsonResponse($job);
    }
    /**
     * Removes a clinic by it's id
     *
     * @return Collection
     */
    public function delete($id)
    {
        $job = Job::find($id);
        $job->delete();
        $job->deleted = true;

        return new JsonResponse($job);
    }
}
