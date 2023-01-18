<?php 

namespace App\Traits;

trait HttpResponse 
{
	protected function success(string $message, $data = null, int $code = 200)
	{
		$response = [
			'success' => true,
			'message' => $message
		];

		if ($data) {
			$response['data'] = $data;
		}

		return response()->json($response, $code);
	}

	protected function error(string $message, $data = null, int $code = 400)
	{
		$response = [
			'success' => false,
			'message' => $message
		];

		if ($data) {
			$response['data'] = $data;
		}

		return response()->json($response, $code);
	}

}