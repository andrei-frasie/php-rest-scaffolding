<?php

class CelebritiesEntity
{
    public string $id;
    public string $title;
    public string $tsCreatedOn;
    public string $tsUpdatedOn;
    public string $tsDeletedOn;
}

class CelebritiesRepository
{
    /**
     * @return null|CelebritiesEntity[]
     */
    public function getAll()
    {
        $dbConnection = create_database_connection();
        $query = "SELECT * FROM `celebrities`;";
        $queryResult = $dbConnection->query($query);
        $entities = null;
        if ($queryResult->num_rows > 0) {
            $entities = array();
            while ($row = $queryResult->fetch_assoc()) {
                $entity = new CelebritiesEntity();
                $entity->id = $row["id"];
                $entity->title = $row["alias"];
                $entity->tsCreatedOn = $row["tsCreatedOn"];
                $entity->tsUpdatedOn = $row["tsUpdatedOn"];
                $entity->tsDeletedOn = $row["tsDeletedOn"];
                array_push($entities, $entity);
            }
        }

        $dbConnection->close();
        return $entities;
    }
}
