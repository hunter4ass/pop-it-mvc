<?php

namespace Src;

class Request
{
    private array $get;
    private array $post;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function input(string $key): ?string
    {
        return $this->post[$key] ?? null;
    }

    public function all(): array
    {
        return $this->post;
    }

    public function has(string $key): bool
    {
        return isset($this->post[$key]);
    }
}
