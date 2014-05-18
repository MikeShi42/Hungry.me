<?php

class ImageController extends BaseController
{
	function GetAndSaveImage()
	{
		$message = 'Upload failed!';
		if(Input::hasFile('image') && Input::file('image')->isValid())
		{
			$file = Input::file('image');
			$destinationPath = public_path() . '/images';
			$filename = $file->getClientOriginalName();
			if(File::exists($destinationPath . '/' . $filename))
			{
				$message = 'File already exists!';
			}else
			{
				$file->move($destinationPath, $filename); //theoretically there is some way to check if this succeeds but I can't get it to work..
				$message = 'Upload successful!';
			}
		}
		return Redirect::to('imgupload')->with('message', $message);
	}
}