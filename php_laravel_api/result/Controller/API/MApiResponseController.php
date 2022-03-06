<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MApiResponseController extends BaseController
{
    public function insert(Request $r) {
        try {
            $input = array(
                'id' => 'required|string',
                'method' => 'required|string',
                'end_point' => 'required|string',
                'response_number' => 'required|string',
                'title' => 'required|string',
                'message' => 'required|string',
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

            MApiResponseModel::create($r->all());

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
            $result = MApiResponseModel::all();

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function update(Request $r, $id) {
        try {
            $input = array(
                'id' => 'required|string',
                'method' => 'required|string',
                'end_point' => 'required|string',
                'response_number' => 'required|string',
                'title' => 'required|string',
                'message' => 'required|string',
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

            $result = MApiResponseModel::find($id);
            $result->id = $r->id;
            $result->method = $r->method;
            $result->end_point = $r->end_point;
            $result->response_number = $r->response_number;
            $result->title = $r->title;
            $result->message = $r->message;
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
            $result = MApiResponseModel::find($id);

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
            $result = MApiResponseModel::find($id);

            return $this->toObject($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
