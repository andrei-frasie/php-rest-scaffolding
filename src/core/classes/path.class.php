<?php

class Path
{
    public static string $SEPARATOR = "/";
    /**
     * @var PathSegment[]
     */
    private array $_pathSegments = array();

    public function __construct(string $path)
    {
        $this->_path = $path;

        $segment = strtok($path, Path::$SEPARATOR);
        while ($segment !== false) {
            array_push($this->_pathSegments, new PathSegment($segment));
            $segment = strtok(Path::$SEPARATOR);
        }
    }

    public function match(string $url)
    {
        $paramMap = array();
        $index = 0;
        $segment = strtok($url, Path::$SEPARATOR);
        while ($segment !== false) {
            if ($index >= count($this->_pathSegments)) return false;

            $pathSegment = $this->_pathSegments[$index];

            if ($pathSegment->isDynamic) {
                $paramMap[$pathSegment->part] = $segment;
            } else {
                $segment === $pathSegment->part;
                if ($segment !== $pathSegment->part) {
                    return false;
                }
            }


            $segment = strtok(Path::$SEPARATOR);
            $index++;
        }

        if ($index !== count($this->_pathSegments)) {
            return false;
        }

        return count($paramMap) > 0 ? $paramMap : true;
    }
}
