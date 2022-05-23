<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateHash;
use App\Http\Resources\HashResource;
use App\Models\Hash;
use Illuminate\Http\Request;


class hashController extends Controller
{
    protected $repository;

    public function __construct(Hash $model)
    {
        $this->repository = $model;
    }

    public function index()
    {
        $hash = $this->repository->get();
        return HashResource::collection($hash);
    }

    public function store(StoreUpdateHash $request)
    {
        $hash = $this->repository->create($request->validated());
        return new HashResource($hash);
    }

    private function calculaHash($input)
    {
        $key = substr(md5(time()), 0, 8);
        var_dump($key);

        $hash = md5($input . $key);
        var_dump($hash);

        $verificaZeros = 0;
        $i = 0;
        while ($verificaZeros == 0) {
            if (strpos($hash, "0000") !== false) {
                $data = [
                    'key ' => $key, //encotnrada no for
                    'hash' => $hash, //encontrada no for
                    'nmrTentativas' => $i //count tentativas
                ];
                var_dump($data);
                $verificaZeros = 1;
                return $data;
            }
            $i++;
            
        }
    }
    public function getHash(Request $request)
    {    // pegar a input apenas uma vez
        $temp = $request->all();
        $input = $temp['input'];
      
      
        for ($i = 1; $i <= 20; $i++) {
            set_time_limit(0);
            $data = $this->calculaHash($input);
            $input = $data['hash'];
            $key = $data['key'];
            $nmrTentativas = $data['nmrTentativas'];
            Hash::create($data);
        }
    }



    /*
        //User Credentials
        $member_id = "Pakainfo";
        $password = "Member987";

        //catalyst to the encryption
        $key = "tamilrokersnew";
        $encrypt_password = md5(md5($member_id . $password) . $key);

        //show encrypted password
        echo $encrypt_password;

        */



    public function show($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
