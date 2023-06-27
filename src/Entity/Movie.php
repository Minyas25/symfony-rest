<?php

namespace App\Entity;

use DateTime;

class Movie
{

    public function __construct(
        private string $title,
        private string $resume,
        private DateTime $released,
        private int $duration,
        private ?int $id = null
    ) {}

    /**
     * @return 
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param  $id 
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title 
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getResume(): string
    {
        return $this->resume;
    }

    /**
     * @param string $resume 
     * @return self
     */
    public function setResume(string $resume): self
    {
        $this->resume = $resume;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getReleased(): DateTime
    {
        return $this->released;
    }

    /**
     * @param DateTime $released 
     * @return self
     */
    public function setReleased(DateTime $released): self
    {
        $this->released = $released;
        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration 
     * @return self
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }
}