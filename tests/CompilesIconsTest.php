<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeCoolicons\BladeCooliconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('coolicon-bulb')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M15 22H9V20H15V22ZM15 19H9L8.777 17C8.65703 16.3385 8.45863 15.6936 8.186 15.079C7.832 14.579 7.463 14.152 7.106 13.735C5.79411 12.5053 5.03465 10.7978 5 9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9C18.9593 10.7868 18.2057 12.4831 16.907 13.711L16.89 13.731C16.534 14.148 16.166 14.58 15.819 15.075C15.5466 15.6912 15.3476 16.3373 15.226 17L15 19ZM12 4C9.23995 4.00331 7.00331 6.23995 7 9C7 10.544 7.644 11.293 8.618 12.428C8.988 12.86 9.408 13.348 9.818 13.919C10.3156 14.8858 10.6555 15.9259 10.825 17H13.176C13.3499 15.929 13.6892 14.8916 14.182 13.925C14.582 13.354 15.001 12.863 15.37 12.431L15.385 12.413C16.357 11.273 17 10.52 17 9C16.9967 6.23995 14.7601 4.00331 12 4Z" fill="currentColor"/></svg>
            SVG;


        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('coolicon-bulb', 'w-6 h-6 text-gray-500')->toHtml();
        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M15 22H9V20H15V22ZM15 19H9L8.777 17C8.65703 16.3385 8.45863 15.6936 8.186 15.079C7.832 14.579 7.463 14.152 7.106 13.735C5.79411 12.5053 5.03465 10.7978 5 9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9C18.9593 10.7868 18.2057 12.4831 16.907 13.711L16.89 13.731C16.534 14.148 16.166 14.58 15.819 15.075C15.5466 15.6912 15.3476 16.3373 15.226 17L15 19ZM12 4C9.23995 4.00331 7.00331 6.23995 7 9C7 10.544 7.644 11.293 8.618 12.428C8.988 12.86 9.408 13.348 9.818 13.919C10.3156 14.8858 10.6555 15.9259 10.825 17H13.176C13.3499 15.929 13.6892 14.8916 14.182 13.925C14.582 13.354 15.001 12.863 15.37 12.431L15.385 12.413C16.357 11.273 17 10.52 17 9C16.9967 6.23995 14.7601 4.00331 12 4Z" fill="currentColor"/></svg>
            SVG;
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('coolicon-bulb', ['style' => 'color: #555'])->toHtml();


        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M15 22H9V20H15V22ZM15 19H9L8.777 17C8.65703 16.3385 8.45863 15.6936 8.186 15.079C7.832 14.579 7.463 14.152 7.106 13.735C5.79411 12.5053 5.03465 10.7978 5 9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9C18.9593 10.7868 18.2057 12.4831 16.907 13.711L16.89 13.731C16.534 14.148 16.166 14.58 15.819 15.075C15.5466 15.6912 15.3476 16.3373 15.226 17L15 19ZM12 4C9.23995 4.00331 7.00331 6.23995 7 9C7 10.544 7.644 11.293 8.618 12.428C8.988 12.86 9.408 13.348 9.818 13.919C10.3156 14.8858 10.6555 15.9259 10.825 17H13.176C13.3499 15.929 13.6892 14.8916 14.182 13.925C14.582 13.354 15.001 12.863 15.37 12.431L15.385 12.413C16.357 11.273 17 10.52 17 9C16.9967 6.23995 14.7601 4.00331 12 4Z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-coolicons.class', 'awesome');

        $result = svg('coolicon-bulb')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M15 22H9V20H15V22ZM15 19H9L8.777 17C8.65703 16.3385 8.45863 15.6936 8.186 15.079C7.832 14.579 7.463 14.152 7.106 13.735C5.79411 12.5053 5.03465 10.7978 5 9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9C18.9593 10.7868 18.2057 12.4831 16.907 13.711L16.89 13.731C16.534 14.148 16.166 14.58 15.819 15.075C15.5466 15.6912 15.3476 16.3373 15.226 17L15 19ZM12 4C9.23995 4.00331 7.00331 6.23995 7 9C7 10.544 7.644 11.293 8.618 12.428C8.988 12.86 9.408 13.348 9.818 13.919C10.3156 14.8858 10.6555 15.9259 10.825 17H13.176C13.3499 15.929 13.6892 14.8916 14.182 13.925C14.582 13.354 15.001 12.863 15.37 12.431L15.385 12.413C16.357 11.273 17 10.52 17 9C16.9967 6.23995 14.7601 4.00331 12 4Z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-coolicons.class', 'awesome');

        $result = svg('coolicon-bulb', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M15 22H9V20H15V22ZM15 19H9L8.777 17C8.65703 16.3385 8.45863 15.6936 8.186 15.079C7.832 14.579 7.463 14.152 7.106 13.735C5.79411 12.5053 5.03465 10.7978 5 9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9C18.9593 10.7868 18.2057 12.4831 16.907 13.711L16.89 13.731C16.534 14.148 16.166 14.58 15.819 15.075C15.5466 15.6912 15.3476 16.3373 15.226 17L15 19ZM12 4C9.23995 4.00331 7.00331 6.23995 7 9C7 10.544 7.644 11.293 8.618 12.428C8.988 12.86 9.408 13.348 9.818 13.919C10.3156 14.8858 10.6555 15.9259 10.825 17H13.176C13.3499 15.929 13.6892 14.8916 14.182 13.925C14.582 13.354 15.001 12.863 15.37 12.431L15.385 12.413C16.357 11.273 17 10.52 17 9C16.9967 6.23995 14.7601 4.00331 12 4Z" fill="currentColor"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeCooliconsServiceProvider::class,
        ];
    }
}
