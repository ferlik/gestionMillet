<?php

namespace App\DTO;


class CommandeArticleDTO
{

    private $client;
    private $date;
    private $article;
    private $quantite;
    function __construct()
    {
        print "fzaef";
    }

    /**
     * Get the value of client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set the value of article
     *
     * @return  self
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get the value of quantite
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }
}
