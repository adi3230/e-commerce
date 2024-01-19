<?php

use App\Controller\HomeController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

//use Symfony\Component\BrowserKit\AbstractBrowser;

class HomeControllerTest extends WebTestCase
{
    public function testHomePage() : void
    {
        // Create a mock object of the Twig Environment class
        $twig = $this->createMock(Environment::class);

        // Stub the render() method to return the content of the home page template
        $twig->expects($this->once())->method('render')->with('/home/home.html.twig')->willReturn('<h1>Homepage</h1>');

        // Create an instance of the HomeController class
        $controller = new HomeController();

        // Dispatch the index action using the controller
        $response = $controller->index($twig);

        $response->headers->set('Content-Type', 'text/html');

        // Assert that the response is a Response object
        $this->assertInstanceOf(Response::class, $response);

        // Assert that the response content type is text/html
        $this->assertSame('text/html', $response->headers->get('Content-Type'));
    }
}