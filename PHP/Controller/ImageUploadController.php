<?php
/**
 * Created by PhpStorm.
 * User: death
 * Date: 8/18/2017
 * Time: 11:41 PM
 */

namespace Conntroller;

class ImageUploadController
{

    private $imagePath;

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    public function ImageUploadController()
    {
        $Username = $_SESSION['Username'];
        if (!is_dir("../../Images/" . $Username)) {
            mkdir('../../Images/' . $Username);
            if (isset($_FILES['uploadPicture'])) {
                $errors = array();
                $fileName = $_FILES['uploadPicture']['name'];
                $fileSize = $_FILES['uploadPicture']['size'];
                $fileTmp = $_FILES['uploadPicture']['tmp_name'];
                $fileType = $_FILES['uploadPicture']['type'];

                $extensions = ["jpeg", "jpg", "png"];
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);

                if ($fileSize > 20971520) {
                    $errors[] = 'File size should not be more than 20 MB';
                }

                if (empty($errors) == true) {
                    $pictureDate = time();
                    $fileUsableName = $Username . $pictureDate . '.' . $extension;
                    move_uploaded_file($fileTmp, "../../Images/" . $Username . "/" . $fileUsableName);
                    chmod('../../Images/' . $Username . '/' . $fileUsableName, 0777);

                    $ImagePath = 'Images/' . $Username . '/' . $fileUsableName;

                    $this->setImagePath($ImagePath);

                }
            }
        } else {
            if (isset($_FILES['uploadPicture'])) {
                $errors = array();
                $fileName = $_FILES['uploadPicture']['name'];
                $fileSize = $_FILES['uploadPicture']['size'];
                $fileTmp = $_FILES['uploadPicture']['tmp_name'];
                $fileType = $_FILES['uploadPicture']['type'];


                $extensions = ["jpeg", "jpg", "png"];
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);

                if ($fileSize > 20971520) {
                    $errors[] = 'File size should not be more than 20 MB';
                }

                if (empty($errors) == true) {
                    $pictureDate = time();
                    $fileUsableName = $Username . $pictureDate . '.' . $extension;
                    move_uploaded_file($fileTmp, "../../Images/" . $Username . "/" . $fileUsableName);
                    chmod('../../Images/' . $Username . '/' . $fileUsableName, 0777);

                    $ImagePath = 'Images/' . $Username . '/' . $fileUsableName;

                    $this->setImagePath($ImagePath);
                }
            }
        }
    }
}