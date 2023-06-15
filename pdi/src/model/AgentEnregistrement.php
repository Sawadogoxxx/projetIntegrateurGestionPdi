<?php

require_once ("src/model/Utilisateur.php");
require_once ("src/interfaces/AgentEnregistrementInterface.php");
require_once ("src/managers/PdiManager.php");

class AgentEnregistrement extends Utilisateur implements  AgentEnregistrementInterface
{
    private PdiManager $manager;
    public  function  __construct(string $username, string $password)
    {
        parent::__construct($username, $password);
        $this->manager=new PdiManager($this->connection);
    }
    /**
     * @return string
     * renvoyer le type d'utilisateur
     */
    public function getUserType():string
    {
        return "AGENT_ENREGISTREMENT";
    }

    /**
     * @param PDI $pdi
     * @return void
     * ajouter un PDI dans la base de donnée par son identifiant
     */
    public function addPDI(PDI $pdi): void
    {
        $this->manager->addPDI($pdi);
    }

    /**
     * @param int $id
     * @return void
     * supprimer un PDI dans la base de donnée par son ID
     */
    public function deletePDI(int $id): void
    {
        $this->manager->deletePDI($id);
    }

    /**
     * @param int $id
     * @return mixed
     * rechercher un PDI par son ID
     */
    public function getPdiByID(int $id)
    {
       return  $this->manager->getPdiByID($id);
    }

    /**
     * @return array
     * renvoyer la liste des PDI enrégistrés
     */
    public function getPdiList(): array
    {
        return  $this->manager->getPdiList();
    }
}