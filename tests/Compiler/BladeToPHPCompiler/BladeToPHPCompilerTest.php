<?php

declare(strict_types=1);

namespace Bladestan\Tests\Compiler\BladeToPHPCompiler;

use Bladestan\Compiler\BladeToPHPCompiler;
use Bladestan\Tests\TestUtils;
use Iterator;
use PHPStan\Testing\PHPStanTestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class BladeToPHPCompilerTest extends PHPStanTestCase
{
    private BladeToPHPCompiler $bladeToPHPCompiler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bladeToPHPCompiler = self::getContainer()->getByType(BladeToPHPCompiler::class);
    }

    #[DataProvider('provideData')]
    public function testCompileAndDecorateTypes(string $filePath): void
    {
        [$inputBladeContents, $expectedPhpContents] = TestUtils::splitFixture($filePath);

        $phpFileContentsWithLineMap = $this->bladeToPHPCompiler->compileContent(
            'foo.blade.php',
            'foo',
            $inputBladeContents,
            []
        );

        $this->assertSame($expectedPhpContents, $phpFileContentsWithLineMap->phpFileContents);
    }

    public static function provideData(): Iterator
    {
        return TestUtils::yieldDirectory(__DIR__ . '/Fixture');
    }

    /**
     * @return list<string>
     */
    public static function getAdditionalConfigFiles(): array
    {
        return [__DIR__ . '/../../../config/extension.neon'];
    }
}
