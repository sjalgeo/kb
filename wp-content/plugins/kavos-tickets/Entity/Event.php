<?php

class Event
{

    private $id;
    private $name;
    private $artist;
    private $artist_long;
    private $slug;
    private $image;
    private $date;
    private $brand_id;
    private $price;

    public function __construct($id)
    {
        global $wpdb;
        $rs = $wpdb->get_results('SELECT * FROM events WHERE id = ' . $id);

        if (sizeof($rs) == 1) {
            $event = $rs[0];

            $this->id = $event->id;
            $this->name = $event->name;
            $this->artist = $event->artist;
            $this->artist_long = $event->artist_long;
            $this->slug = $event->slug;
            $this->image = $event->image;
            $this->date = $event->date;
            $this->brand_id = $event->brand_id;
            $this->price = $event->price;
        }
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getArtistLong()
    {
        return $this->artist_long;
    }

    public function setArtistLong($artist_long)
    {
        $this->artist_long = $artist_long;
    }

    public function getBrandId()
    {
        return $this->brand_id;
    }

    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDateFormatted()
    {
        return cleanDate($this->date);
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDisplayName($variations=false)
    {
        $brand = new Brand($this->brand_id);
        $name = $brand->getName().' - '.$this->getDateFormatted();
        if ($this->artist!='') $name .= ' ('.$this->artist.')';

        foreach($variations as $key => $var){
            if ($key=='cruiseticket') $name .= ' ('. ucwords($var) . ')';
        }

        return $name;
    }

    public function getPaypalName()
    {
        $brand = new Brand($this->brand_id);
        $name = $brand->getName().' - '.$this->getDateFormatted();
        if ($this->artist!='') $name .= ' ('.$this->artist.')';
        return $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice($variations=false)
    {
        return kbFormatPrice($this->getPriceRaw($variations));
    }

    public function getPriceRaw($variations=false)
    {
        if($variations!=false AND $variations != array()){

            $opts = kbOptionsCruiseTicketData();

            foreach ($variations as $key => $var) {
                if ($key=='cruiseticket')
                {
                    return $opts[$var]['priceraw'];
                }
            }
        }
        elseif (is_null($this->price))
        {
            $brand = new Brand($this->brand_id);
            return $brand->getDefaultPrice();
        }

        return $this->price;
    }

    public function getPaypalPrice()
    {
        return kbPaypalPrice($this->getPriceRaw());
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPriceFormatted($option=false, $value=false)
    {
        if (false==$option) {
            return $this->getPrice();
        }
        elseif ($option=='cruiseticket'){
            $prices = kbOptionsCruiseTicketData();
            $price = $prices[$value]['priceraw'];
            return kbFormatPrice($price);
        }
        else{

            # TODO : LOG THIS AND EMAIL ME

            return 'Price Not Found.';
        }
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}