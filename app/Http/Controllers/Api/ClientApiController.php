<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use Illuminate\Http\Response;
use App\Http\Resources\ClientResource;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::getClient();
        return response()->json($client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        try {
            $client = new Client;

            $request_end = [
                'cpf' => $request->cpf,
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'state' => $request->state,
                'city' => $request->city,
            ];

            $client->fill($request_end)->save();

            return new ClientResource($client);
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return new ClientResource($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        try {
            $client = Client::find($id);

            $request_end = [
                'cpf' => $request->cpf,
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'state' => $request->state,
                'city' => $request->city,
            ];

            $client->fill($request_end)->save();

            return new ClientResource($client);
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Client = Client::findOrfail($id);
        $Client->delete();

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $cpf = $request->cpf ?? null;
        $name = $request->name ?? null;
        $date_of_birth = $request->date_of_birthday ?? null;
        $state = $request->state ?? null;
        $city = $request->city ?? null;

        $client = Client::getClient(cpf: $cpf, name: $name, date_of_birth: $date_of_birth, state: $state, city: $city)->toArray();
        
        return response()->json($client);
    }
}
