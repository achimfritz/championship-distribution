<?php

namespace AchimFritz\ChampionShip\User\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "AchimFritz.ChampionShip".*
 *                                                                        *
 *                                                                        */

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Security\Account;

/**
 * A User
 *
 * @Flow\Entity
 */
class User
{
    /**
     * @var \Neos\Flow\Security\Account
     * @ORM\OneToOne(cascade={"all"})
     */
    protected $account;

    /**
     * @var \Doctrine\Common\Collections\Collection<\AchimFritz\ChampionShip\Chat\Domain\Model\ChatEntry>
     * @ORM\OneToMany(mappedBy="user", cascade={"all"})
     */
    protected $chatEntries;

    /**
     * @var bool
     */
    protected $disabled = false;


    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     * @Flow\Validate(type="EmailAddress")
     */
    protected $email;

    /**
     * @var \Doctrine\Common\Collections\Collection<\AchimFritz\ChampionShip\User\Domain\Model\TipGroup>
     * @ORM\ManyToMany
     */
    protected $tipGroups;

    /**
     * @var \AchimFritz\ChampionShip\User\Domain\Model\TipGroup
     * @ORM\ManyToOne
     */
    protected $tipGroup;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->tipGroups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return TipGroup
     */
    public function getTipGroup()
    {
        return $this->tipGroup;
    }

    /**
     * @param TipGroup $tipGroup
     * @return void
     */
    public function setTipGroup(TipGroup $tipGroup)
    {
        $this->tipGroup = $tipGroup;
        $this->addTipGroup($tipGroup);
    }

    public function getTipGroups(): Collection
    {
        return $this->tipGroups;
    }

    public function setTipGroups(Collection $tipGroups): void
    {
        $this->tipGroups = $tipGroups;
    }

    public function removeTipGroup(TipGroup $tipGroup): void
    {
        $this->tipGroups->removeElement($tipGroup);
    }

    public function hasTipGroup(TipGroup $tipGroup): bool
    {
        return $this->tipGroups->contains($tipGroup);
    }

    public function hasOneOfTipGroups(Collection $otherTipGroups): bool
    {
        foreach ($otherTipGroups as $otherTipGroup) {
            if ($this->hasTipGroup($otherTipGroup) === true) {
                return true;
            }
        }
        return false;
    }

    public function addTipGroup(TipGroup $tipGroup): void
    {
        if ($this->hasTipGroup($tipGroup) === false) {
            $this->tipGroups->add($tipGroup);
        }
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->getAccount()->getAccountIdentifier();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAccount()->getAccountIdentifier();
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        $tipGroup = $this->getTipGroup();
        if ($tipGroup instanceof TipGroup) {
            return $this->getAccount()->getAccountIdentifier() . '@' . $tipGroup->getName();
        } else {
            return $this->getAccount()->getAccountIdentifier();
        }
    }

    /**
     * @param Account $account
     * @return void
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param boolean $disabled
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }
}
