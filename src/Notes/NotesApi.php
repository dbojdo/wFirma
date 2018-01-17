<?php

namespace Webit\WFirmaSDK\Notes;

use Webit\WFirmaSDK\Entity\EntityApi;
use Webit\WFirmaSDK\Entity\Parameters\Parameters;
use Webit\WFirmaSDK\Module;

class NotesApi
{
    /** @var EntityApi */
    private $entityApi;

    /**
     * @param EntityApi $entityApi
     */
    public function __construct(EntityApi $entityApi)
    {
        $this->entityApi = $entityApi;
    }

    /**
     * @param Note $note
     * @return \Webit\WFirmaSDK\Entity\Entity|Note
     */
    public function add(Note $note)
    {
        return $this->entityApi->add($note);
    }

    /**
     * @param Note $note
     * @return \Webit\WFirmaSDK\Entity\Entity|Note
     */
    public function edit(Note $note)
    {
        return $this->entityApi->edit($note);
    }

    /**
     * @param NoteId $id
     */
    public function delete(NoteId $id)
    {
        $this->entityApi->delete($id->id(), Module::notes());
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|Note[]
     */
    public function find(Parameters $parameters = null)
    {
        return $this->entityApi->find(Module::notes(), $parameters);
    }

    /**
     * @param Parameters|null $parameters
     * @return \Webit\WFirmaSDK\Entity\Entity[]|\Webit\WFirmaSDK\Entity\EntityIterator|Note[]
     */
    public function findAll(Parameters $parameters = null)
    {
        return $this->entityApi->findAll(Module::notes(), $parameters);
    }

    /**
     * @param NoteId $id
     * @return \Webit\WFirmaSDK\Entity\Entity|Note
     */
    public function get(NoteId $id)
    {
        return $this->entityApi->get($id->id(), Module::notes());
    }

    /**
     * @param Parameters|null $parameters
     * @return int
     */
    public function count(Parameters $parameters = null)
    {
        return $this->entityApi->count(Module::notes(), $parameters);
    }
}