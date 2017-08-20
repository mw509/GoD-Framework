function uploadImage($imageFile, $newImageName, $userID, $imageDir){

if (!file_exists($ImageDir)) {
    mkdir($ImageDir, 0777, true);
}

 $allowedExts = array("gif", "jpeg", "jpg", "png");
      $temp = explode(".", $imageFile["name"]);
      $extension = end($temp);
      if ((($imageFile["type"] == "image/gif")
      || ($imageFile["type"] == "image/jpeg")
      || ($imageFile["type"] == "image/jpg")
      || ($imageFile["type"] == "image/pjpeg")
      || ($imageFile["type"] == "image/x-png")
      || ($imageFile["type"] == "image/png"))
      && ($imageFile["size"] < 1000000)
      && in_array($extension, $allowedExts))
        {
        if ($imageFile["error"] > 0)
          {
          echo "Return Code: " . $imageFile["error"] . "<br>";
          }
        else 
          {

            $fileName = $temp[0].".".$temp[1];
            $temp[0] = rand(0, 3000); //Set to random number
            $fileName;

          if (file_exists($imageDir . $imageFile["name"]))
            {
            echo $imageFile["name"] . " already exists. ";
            }
          else
            {
            $temp = explode(".", $imageFile["name"]);
      			$newfilename = $newImageName . '.' . end($temp);
		      	move_uploaded_file($imageFile["tmp_name"], $imageDir . $newfilename);
            echo "Stored in: " . "$imageDir . $ImageFile["name"];
            }
          }
        }
      else
        {
        echo "Invalid file";
        }

}
