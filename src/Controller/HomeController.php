<?php

namespace App\Controller;

use App\Entity\DestructionSite;
use App\Repository\DestructionSiteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $this->generate_captcha_code();

        return $this->render('home/index.html.twig', [
            'captchaCode' => $this->session->get('captcha'),
        ]);
    }

    /**
     * @Route("/captcha_generation", name="captcha")
     */
    public function captchaGeneration()
    {
        // Create Captcha Code Image
            // Je crée mon image
            $image = imagecreate(120,30);
            // j'ajoute une couleur de fond
            $white = imagecolorallocatealpha($image, 255, 255, 255, 40);
            $black = imagecolorallocatealpha($image, 0, 0,0, 3);



            $font = 'assets/fonts/arial.ttf';
            /* Hauteur et largeur des caratères */
            $largeurCaractere = ImageFontWidth(5);
            $hauteurCaractere = ImageFontHeight(5);
            /* Longueur du texte (taille caratère X nombre de caractère) */
            $largeurTxt = $largeurCaractere * strlen($this->session->get('captcha'));
            /* Recherche de la position horizontale centrale pour centrer le texte */
            $positionCentreHor = ceil((120 - $largeurTxt) / 2);
            /* Recherche de la position horizontale centrale pour centrer le texte */
            $positionCentreVer = ceil((30 - $hauteurCaractere) / 2);
            /* Ajout du texte au centre de l'image */
            $image_string = ImageString($image, 5, $positionCentreHor, $positionCentreVer, $this->session->get('captcha'), $black);




            ob_start();
            imagejpeg($image);


            $str_img = ob_get_contents();
            ob_end_clean();


        $headers = array('Content-Type' => 'image/jpeg','Content-Disposition' => 'inline; filename="captcha.jpeg"');
        return New Response($str_img, 200, $headers );

    }

    // function captcha generation
    function generate_captcha_code($length=5){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<$length; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        $this->session->set('captcha', $string);
        return $string;
    }

    /**
     * @Route("/destruction_of_site", name="destruction_of_site")
     */
    public function descrutionSite(DestructionSiteRepository $destructionSiteRepository, EntityManagerInterface $manager)
    {
        // Je recupère mon entité
        $destruction = $destructionSiteRepository->findOneBy(['id'=>1]);
        // Je récuperere le nombre d'execution avant l'action
        $nBreDestruction = $destructionSiteRepository->findOneBy(['id'=>1])->getExecution();

        // J'ajoute mon execution
        $destruction->setExecution($nBreDestruction += 1);
        $manager->persist($destruction);
        $manager->flush();

        // Je récuperere le nombre d'execution après l'action
        $nBreDestructionFinal = $destructionSiteRepository->findOneBy(['id'=>1])->getExecution();


        return New Response($nBreDestructionFinal);

    }
}
