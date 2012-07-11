<?php

namespace OpenDDR\Parser;

interface XmlParserInterface extends ParserInterface
{
    public function startTag($parser, $name, array $attribs);

    public function endTag($parser, $name);
}
