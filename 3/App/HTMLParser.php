<?php

namespace App;

/**
 * Class HTMLParser
 */
class HTMLParser extends Parser
{
    /** @var string */
    private $content;

    /** @var string */
    private $url;

    /**
     * HTMLParser constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->setUrl($url);
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     */
    public function setContent()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,  $this->getUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        $this->content = curl_exec($ch);
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        $content = $this->getContent();
        if (!$content) {
            return [];
        }

        preg_match_all('/<([^\/!][a-z1-9]*)/i', $content, $matches);

        return array_count_values($matches[1]);
    }


    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

}