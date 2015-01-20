<?php

class Brand {

    private $id;
    private $name;
    private $slug;
    private $image;
    private $description;
    private $defaultprice;
    private $enabled;
    private $offsalemessage;

    public function __construct($id)
    {
        global $wpdb;
        $rs = $wpdb->get_results( 'SELECT * FROM brands WHERE id = '.$id );

        if (sizeof($rs) ==1)
        {
            $brand = $rs[0];

            $this->id = $brand->id;
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->image = $brand->image;
            $this->description = $brand->description;
            $this->defaultprice = $brand->defaultprice;
            $this->enabled = $brand->enabled;
            $this->offsalemessage = $brand->offsalemessage;
        }
    }
public function getOffsaleMessage()
{
    return $this->offsalemessage;
}
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDefaultprice($formatted=false)
    {
        if (!is_null($this->defaultprice)) return  $formatted ? kbFormatPrice($this->defaultprice) : $this->defaultprice ;

        return 'null';
    }

    public function setDefaultprice($defaultprice)
    {
        $this->defaultprice = $defaultprice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

}