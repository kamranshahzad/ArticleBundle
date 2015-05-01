<?php



namespace Kamran\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use Kamran\CoreBundle\Controller\CrudController as BaseController;

use Kamran\ArticleBundle\Entity\Articles;
use Kamran\ArticleBundle\Entity\ArticleStatus;
use Kamran\ArticleBundle\Form\Type\ArticleStatusType;
use Kamran\ArticleBundle\Form\Type\ArticleType;

/**
 * Index controller.
 *
 * @Route("/articles")
 */

class IndexController extends BaseController
{

    protected function getEntity()
    {
        return 'KamranArticleBundle:Articles';
    }

    /**
     * @Route("/", name="articles_index")
     * @Template()
    */
    public function indexAction()
    {

      // return $this->renderMe('KamranArticleBundle:Labs:list.html.twig', array());
        return array('abc' => 'yapiii'  );
    }



    /**
     * @Route("/add", name="articles_add")
     */
    public function addAction(Request $request){

        echo $request->attributes->get('_parent_template');
        $params = array();
        $params['form'] = new ArticleType();
        $params['entity'] = '\Kamran\ArticleBundle\Entity\Articles';
        $params['action'] = 'articles_add';
        //$params['template'] = '';
        return $this->doAdd($request , $params);
    }


    /**
     * @Route("/addstatus", name="articles_status_add")
     * @Template()
     */
    public function addstatusAction(Request $request){

        $entity = new ArticleStatus();
        $form = $this->createForm(new ArticleStatusType() ,$entity);

        if ($request->getMethod() === 'POST'){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                echo "Data Saved";
            }
        }
        return array(
            'form'   => $form->createView()
        );
    }







}
