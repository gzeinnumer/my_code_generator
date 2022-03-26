<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CarangController extends BaseController
{
    public function insert(Request $r) {
        try {
            $input = array(
                'id' => 'required|string',
                'name' => 'required|string',
                'created_at' => 'required|string',
                'updated_at' => 'required|string'
            );

            $validator = Validator::make($r->all(), $input);

            if($validator->fails()){
                $apiResponse = $this->getApiResponse(0);
                $apiResponse->message = $validator->getMessageBag();
                return $this->responseFailed($apiResponse);
            }

            DB::beginTransaction();

            CarangModel::create($r->all());

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        }  catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseError($th);
        }
    }

    public function all() {
        try {
            $result = CarangModel::all();

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function update(Request $r, $id) {
        try {
            $input = array(
                'id' => 'required|string',
                'name' => 'required|string',
                'created_at' => 'required|string',
                'updated_at' => 'required|string'
            );

            $validator = Validator::make($r->all(), $input);

            if($validator->fails()){
                $apiResponse = $this->getApiResponse(0);
                $apiResponse->message = $validator->getMessageBag();
                return $this->responseFailed($apiResponse);
            }

            DB::beginTransaction();

            $result = CarangModel::find($id);
            $result->id = $r->id;
            $result->name = $r->name;
            $result->created_at = $r->created_at;
            $result->updated_at = $r->updated_at;
            $result->save();

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        }  catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseError($th);
        }
    }

    public function delete($id) {
        try {
            $result = CarangModel::find($id);

            DB::beginTransaction();

            $result->delete();

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function find($id) {
        try {
            $result = CarangModel::find($id);

            return $this->toObject($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
