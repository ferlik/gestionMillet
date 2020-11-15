<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="commandes")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=CommandeArticle::class, mappedBy="commande")
     */
    private $commandeArticles;

    public function __construct()
    {
        $this->commandeArticles = new ArrayCollection();
        $this->date = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|CommandeArticle[]
     */
    public function getCommandeArticles(): Collection
    {
        return $this->commandeArticles;
    }

    public function addCommandeArticle(CommandeArticle $commandeArticle): self
    {
        if (!$this->commandeArticles->contains($commandeArticle)) {
            $this->commandeArticles[] = $commandeArticle;
            $commandeArticle->setCommande($this);
        }

        return $this;
    }

    public function removeCommandeArticle(CommandeArticle $commandeArticle): self
    {
        if ($this->commandeArticles->removeElement($commandeArticle)) {
            // set the owning side to null (unless already changed)
            if ($commandeArticle->getCommande() === $this) {
                $commandeArticle->setCommande(null);
            }
        }

        return $this;
    }
}
