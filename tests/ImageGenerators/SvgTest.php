<?php

namespace Spatie\MediaLibrary\Test\ImageGenerators;

use Spatie\MediaLibrary\Test\TestCase;
use Spatie\MediaLibrary\ImageGenerators\FileTypes\Svg;

class SvgTest extends TestCase
{
    /** @test */
    public function it_can_convert_a_svg()
    {
        $imageGenerator = new Svg();

        if (! $imageGenerator->requirementsAreInstalled()) {
            $this->markTestSkipped('Skipping svg test because requirements to run it are not met');
        }

        $media = $this->testModelWithoutMediaConversions->addMedia($this->getTestSvg())->toMediaCollection();

        $this->assertTrue($imageGenerator->canConvert($media));

        $imageFile = $imageGenerator->convert($media->getPath());

        $this->assertEquals('image/jpeg', mime_content_type($imageFile));
    }
}
