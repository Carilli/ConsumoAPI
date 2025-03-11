<?php
class Cache {
    private $maxSize;
    private $atualSize;
    private $dadosCache;
    private $fifo;
    private $lfu;
    private $percasCache;
    private $id;
    private $policy;

    public function __construct($maxSize, $policy) {
        $this->maxSize = $this->convertToBytes($maxSize);
        $this->atualSize = 0;
        $this->dadosCache = [];
        $this->fifo = [];
        $this->lfu = [];
        $this->percasCache = 0;
        $this->id = 1;
        $this->policy = $policy;
    }

    private function convertToBytes($size) {
        preg_match('/[A-Za-z]+/', $size, $matches);
        preg_match('/\d+/', $size, $numMatch);
        $unit = isset($matches[0]) ? $matches[0] : '';
        $value = isset($numMatch[0]) ? $numMatch[0] : 0;

        switch ($unit) {
            case 'MB': return $value * 1024 * 1024;
            case 'KB': return $value * 1024;
            default: return $value;
        }
    }

    public function add($data) {
        $dataSize = strlen($data);

        if ($this->atualSize + $dataSize > $this->maxSize) {
            $this->evict();
            $this->percasCache++;
            echo "Cache Miss! Dados removidos devido ao limite de memória.\n";
        }

        $this->dadosCache[$this->id] = $data;
        $this->fifo[] = $this->id;  
        $this->lfu[$this->id] = 1; 
        $this->atualSize += $dataSize;
        $this->id++;
    }

    private function evict() {
        if ($this->policy === "FIFO") {
            $firstId = array_shift($this->fifo);
            $this->removeFromCache($firstId);
        } elseif ($this->policy === "LFU") {
            asort($this->lfu); 
            $leastUsedId = array_key_first($this->lfu);
            $this->removeFromCache($leastUsedId);
        }
    }

    private function removeFromCache($id) {
        if (isset($this->dadosCache[$id])) {
            $this->atualSize -= strlen($this->dadosCache[$id]);
            unset($this->dadosCache[$id]);
            unset($this->lfu[$id]);
        }
    }
    public function get($id) {
        if (!isset($this->dadosCache[$id])) {
            $this->percasCache++;
            echo "Cache Miss! Item ID '$id' não encontrado.\n";
            return null;
        }
        $this->lfu[$id]++;

        return $this->dadosCache[$id];
    }

    public function showStatus() {
        $usedPerct = round(($this->atualSize / $this->maxSize) * 100, 2);
        echo "Cache Status:\n";
        echo "Tamanho máximo: {$this->maxSize} Bytes\n";
        echo "Tamanho atual: {$this->atualSize} Bytes ({$usedPerct}%)\n";
        echo "Cache Misses: {$this->percasCache} \n";
        echo "Política de Evicção: {$this->policy}\n";
    }
    
    public function showCacheContent() {
        if (empty($this->dadosCache)) {
            echo "A cache está vazia.\n";
        } else {
            echo "Conteúdo da Cache:\n";
            foreach ($this->dadosCache as $id => $data) {
                echo "ID: $id | Acessos: {$this->lfu[$id]}\n";
            }
        }
    }
}
