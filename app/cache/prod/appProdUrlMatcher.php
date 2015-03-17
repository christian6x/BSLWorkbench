<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/com')) {
            // com_homepage
            if (rtrim($pathinfo, '/') === '/com/main') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'com_homepage');
                }

                return array (  '_controller' => 'ComBundle\\Controller\\DefaultController::indexAction',  '_route' => 'com_homepage',);
            }

            if (0 === strpos($pathinfo, '/com/ips-')) {
                if (0 === strpos($pathinfo, '/com/ips-square-s')) {
                    // com_ips_square_suggest
                    if (rtrim($pathinfo, '/') === '/com/ips-square-suggest') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'com_ips_square_suggest');
                        }

                        return array (  '_controller' => 'ComBundle\\Controller\\IpsSquareSuggestController::renderAction',  '_route' => 'com_ips_square_suggest',);
                    }

                    // com_ips_square_search
                    if (0 === strpos($pathinfo, '/com/ips-square-search') && preg_match('#^/com/ips\\-square\\-search(?:/(?P<items>[^/]++)(?:/(?P<page>[^/]++))?)?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'com_ips_square_search')), array (  '_controller' => 'ComBundle\\Controller\\IpsSquareSearchController::renderResultAction',  'items' => 100,  'page' => 1,));
                    }

                    // square_suggest
                    if ($pathinfo === '/com/ips-square-suggest/suggestion') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_square_suggest;
                        }

                        return array (  '_controller' => 'ComBundle\\Controller\\IpsSquareSuggestController::suggestAction',  '_route' => 'square_suggest',);
                    }
                    not_square_suggest:

                }

                if (0 === strpos($pathinfo, '/com/ips-file-post')) {
                    // com_ips_file_post
                    if (rtrim($pathinfo, '/') === '/com/ips-file-post') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'com_ips_file_post');
                        }

                        return array (  '_controller' => 'ComBundle\\Controller\\IpsFilePostController::renderAction',  '_route' => 'com_ips_file_post',);
                    }

                    // comFilePost
                    if ($pathinfo === '/com/ips-file-post/post') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_comFilePost;
                        }

                        return array (  '_controller' => 'ComBundle\\Controller\\IpsFilePostController::postAction',  '_route' => 'comFilePost',);
                    }
                    not_comFilePost:

                }

                if (0 === strpos($pathinfo, '/com/ips-untrusted-fuzzy-search')) {
                    // com_ips_untrusted_fuzzy_search
                    if (rtrim($pathinfo, '/') === '/com/ips-untrusted-fuzzy-search') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'com_ips_untrusted_fuzzy_search');
                        }

                        return array (  '_controller' => 'ComBundle\\Controller\\IpsUntrustedFuzzySearchController::renderAction',  '_route' => 'com_ips_untrusted_fuzzy_search',);
                    }

                    // comUntrustedFuzzySearch
                    if ($pathinfo === '/com/ips-untrusted-fuzzy-search/search') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_comUntrustedFuzzySearch;
                        }

                        return array (  '_controller' => 'ComBundle\\Controller\\IpsUntrustedFuzzySearchController::searchAction',  'refresh' => 'YES',  'items' => 100,  'page' => 1,  '_route' => 'comUntrustedFuzzySearch',);
                    }
                    not_comUntrustedFuzzySearch:

                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // _homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => '_homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
