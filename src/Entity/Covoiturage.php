<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CovoiturageRepository;

#[ORM\Entity(repositoryClass: CovoiturageRepository::class)]
class Covoiturage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $date_depart = null;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $heure_depart = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $lieu_depart = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $lieu_arrivee = null;

    #[ORM\Column(type: 'integer')]
    private ?int $nb_place = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private ?float $prix_personne = null;

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heure_depart;
    }

    public function getLieuDepart(): ?string
    {
        return $this->lieu_depart;
    }

    public function getLieuArrivee(): ?string
    {
        return $this->lieu_arrivee;
    }

    public function getNbPlace(): ?int
    {
        return $this->nb_place;
    }

    public function getPrixPersonne(): ?float
    {
        return $this->prix_personne;
    }

    // Setters
    public function setDateDepart(\DateTimeInterface $date_depart): self
    {
        $this->date_depart = $date_depart;
        return $this;
    }

    public function setHeureDepart(\DateTimeInterface $heure_depart): self
    {
        $this->heure_depart = $heure_depart;
        return $this;
    }

    public function setLieuDepart(string $lieu_depart): self
    {
        $this->lieu_depart = $lieu_depart;
        return $this;
    }

    public function setLieuArrivee(string $lieu_arrivee): self
    {
        $this->lieu_arrivee = $lieu_arrivee;
        return $this;
    }

    public function setNbPlace(int $nb_place): self
    {
        $this->nb_place = $nb_place;
        return $this;
    }

    public function setPrixPersonne(float $prix_personne): self
    {
        $this->prix_personne = $prix_personne;
        return $this;
    }
}
