<?php

class TestController extends FrontController
{
    public function init()
    {
        parent::init();

        Yii::import('common.extensions.yii-mail.*');
    }

    public function actionIndex()
    {
        if (Yii::app()->user->getId() > 0)
            $this->redirect('/plan/list/');

        $this->setBodyClass('index');
        $this->render('index');
    }

    public function actionUserphones()
    {
        die();
        $connection = Yii::app()->db;
        $sql = "
       SELECT
          s0x_profiles.`user_id`,
          s0x_profiles.`company_phone1`,
          s0x_profiles.`company_phone2`,
          s0x_profiles.`company_phone3`
        FROM
          `s0x_profiles`
          INNER JOIN z_user
            ON z_user.id = s0x_profiles.`user_id`
        ";
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();

        foreach ($result as $user) {
            if (strlen($user['company_phone1']) > 5 || strlen($user['company_phone2']) > 5 || strlen($user['company_phone3']) > 5) {
                #number1
                if (strlen($user['company_phone1']) > 5) {
                    preg_match("|^\((\d+)\) (\d+)\-(\d+)\-(\d+)?$|", $user['company_phone1'], $number);
                    if (count($number) > 4) {
                        $model = new Phone;
                        $model->phonecode = $number[1];
                        $model->phone = $number[2] . $number[3] . $number[4];
                        $model->country_id = 1;
                        $model->user_id = $user['user_id'];
                        $model->save();
                    }
                }
                #number2
                if (strlen($user['company_phone2']) > 5) {
                    preg_match("|^\((\d+)\) (\d+)\-(\d+)\-(\d+)?$|", $user['company_phone2'], $number);
                    if (count($number) > 4) {
                        $model = new Phone;
                        $model->phonecode = $number[1];
                        $model->phone = $number[2] . $number[3] . $number[4];
                        $model->country_id = 1;
                        $model->user_id = $user['user_id'];
                        $model->save();
                    }
                }
                #number3
                if (strlen($user['company_phone3']) > 5) {
                    preg_match("|^\((\d+)\) (\d+)\-(\d+)\-(\d+)?$|", $user['company_phone3'], $number);
                    if (count($number) > 4) {
                        $model = new Phone;
                        $model->phonecode = $number[1];
                        $model->phone = $number[2] . $number[3] . $number[4];
                        $model->country_id = 1;
                        $model->user_id = $user['user_id'];
                        $model->save();
                    }
                }
                //CVarDumper::dump($user,10,true);
            }
        }
    }

    public function actionAddcompany()
    {
        die();
        $connection = Yii::app()->db;
        $sql = '
        SELECT
          distinct(s0x_data_organizations.`p_idorg`) AS id,
          s0x_data_organizations.name AS title,
          if(CHAR_LENGTH(s0x_data_organizations.city)>3,s0x_data_organizations.city,z_region.center) as city,
          z_region.id AS region_id,
          z_region.title AS region
        FROM
          `s0x_data_organizations`
        LEFT JOIN z_region
        ON z_region.id=s0x_data_organizations.region_id
        WHERE s0x_data_organizations.`parent` = 0
        ';
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        $cgArr = array();
        foreach ($result as $cg) {
            $cgArr[$cg['id']] = $cg['id'];
            /*$groupmodel = new Companygroup;
            $groupmodel->id = $cg['id'];
            $groupmodel->title = $cg['title'];
            $groupmodel->save();*/
        }
        $sql = '
        SELECT
          distinct(s0x_data_organizations.`p_idorg`) AS id,
          s0x_data_organizations.`parent` AS companygroup_id,
          s0x_data_organizations.name AS title,
          if(CHAR_LENGTH(s0x_data_organizations.city)>3,s0x_data_organizations.city,z_region.center) as city,
          z_region.id AS region_id,
          z_region.title AS region
        FROM
          `s0x_data_organizations`
        LEFT JOIN z_region
        ON z_region.id=s0x_data_organizations.region_id
        WHERE s0x_data_organizations.`parent` IN (' . implode(',', $cgArr) . ')
        ';
        $command = $connection->createCommand($sql);
        $result2 = $command->queryAll();
        $cArr = array();
        foreach ($result2 as $c) {
            $cArr[$c['companygroup_id']][$c['id']] = $c;

            /* $companymodel = new Company;
             $companymodel->id = $cg['id'];
             $companymodel->companygroup_id = $cg['companygroup_id'];
             $companymodel->title = $cg['title'];
             $companymodel->save();*/

        }

        foreach ($result as $cg) {
            echo "<strong>" . $cg['id'] . " - " . $cg['title'] . "</strong>";
            echo "<br/>";
            if (isset($cArr[$cg['id']]))
                foreach ($cArr[$cg['id']] as $c) {
                    echo "-----" . $c['id'] . " - " . $c['title'] . " - " . $c['city'] . " - " . $c['region'];
                    echo "<br/>";

                    #город
                    $city = City::model()->findByAttributes(array('title' => trim($c['city']), 'region_id' => $c['region_id']));
                    if (!$city)
                        $city = new City;
                    $city->title = trim($c['city']);
                    $city->region_id = $c['region_id'];
                    $city->save();

                    #компания
                    $companymodel = new Company;
                    $companymodel->id = $c['id'];
                    $companymodel->companygroup_id = $c['companygroup_id'];
                    $companymodel->title = $c['title'];
                    $companymodel->egrpou = 0;
                    $companymodel->city_id = $city->id;
                    $companymodel->save();
                    print_r($companymodel->getErrors());
                }
            else {
                echo "-----" . 0 . " - " . $cg['title'] . " - " . $cg['city'] . " - " . $cg['region'];
                echo "<br/>";

                #город
                $city = City::model()->findByAttributes(array('title' => trim($cg['city']), 'region_id' => $cg['region_id']));
                if (!$city)
                    $city = new City;
                $city->title = trim($cg['city']);
                $city->region_id = $cg['region_id'];
                $city->save();

                #компания
                $companymodel = new Company;
                $companymodel->companygroup_id = $cg['id'];
                $companymodel->title = $cg['title'];
                $companymodel->egrpou = 0;
                $companymodel->city_id = $city->id;
                $companymodel->save();
                print_r($companymodel->getErrors());

            }
        }

        //CVarDumper::dump($result,10,true);
    }

    public function actionUsercompany()
    {
        die();
        $connection = Yii::app()->db;
        $sql = '
                SELECT
          z_companygroup.id,
          z_companygroup.`title`,
          z_company.id AS company_id,
          z_company.`title` AS company_title,
          s0x_groups.id AS group_id,
          `s0x_users`.id AS user_id,
          `s0x_users`.email/*,
          s0x_groups.`name`,
          s0x_groups.`description`,
          s0x_permissions.`roles`*/
        FROM
          `z_companygroup`
        LEFT JOIN z_company
          ON z_company.companygroup_id=z_companygroup.id
        LEFT JOIN `s0x_groups`
          ON s0x_groups.`companygroup_id`=z_companygroup.id
        LEFT JOIN `s0x_users`
          ON `s0x_users`.`group_id`=s0x_groups.id
        /*INNER JOIN `s0x_permissions`
        ON s0x_permissions.`group_id`=s0x_groups.`id` AND s0x_permissions.`module`="zakupki"*/

        ';
        $command = $connection->createCommand($sql);
        $result2 = $command->queryAll();

        $data = array();
        foreach ($result2 as $user) {
            $data[$user['id']]['group'] = array('id' => $user['id'], 'title' => $user['title']);
            if ($user['company_id'] > 0)
                $data[$user['id']]['companies'][$user['company_id']] = array('id' => $user['company_id'], 'title' => $user['company_title']);
            if ($user['user_id'] > 0)
                $data[$user['id']]['users'][$user['user_id']] = array('id' => $user['user_id'], 'title' => $user['email']);
            /*echo "<tr>";
            echo "<td>".$user['title']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "</tr>";*/
        }

        foreach ($data as $row) {
            #привязка группы компаний
            /* $if(isset($row['users'])){
                $row['users']=array_values($row['users']);
                echo $row['users'][0]['title'];
                CompanygroupUser=new CompanygroupUser;
                $CompanygroupUser->companygroup_id=$row['group']['id'];
                $CompanygroupUser->user_id=$row['users'][0]['id'];
                $CompanygroupUser->status=1;
                $CompanygroupUser->save();

            }*/
            #привязка компании
            /*if(isset($row['companies']))
            foreach($row['companies'] as $comp){
                if(isset($row['users']))
                foreach($row['users'] as $us){
                    $CompanyUser=new CompanyUser;
                    $CompanyUser->company_id=$comp['id'];
                    $CompanyUser->user_id=$us['id'];
                    $CompanyUser->status=1;
                    $CompanyUser->companyrole_id=2;
                    $CompanyUser->save();
                }

            }*/
        }


        echo "<table border='1'>";
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['group']['title'] . "</td>";

            echo "<td>
            ";
            foreach ($row['companies'] as $comp)
                echo $comp['title'] . "<br/>";
            echo "</td>";
            echo "<td>
            ";
            foreach ($row['users'] as $comp)
                echo $comp['title'] . "<br/>";
            echo "</td>";
            echo "</tr><tr><td>&nbsp;</td></tr>";
        }
        echo "</table>";
        CVarDumper::dump($data, 10, true);
    }

    public function actionUserseller()
    {
        die();
        //die();
        $connection = Yii::app()->db;
        $sql = '
        SELECT
          s0x_profiles.user_id,
          s0x_profiles.company_name,
          s0x_profiles.region_id,
          s0x_profiles.company_adress as address,
          s0x_profiles.code_egrpou as egrpou,
          if(CHAR_LENGTH(s0x_profiles.company_city)>3,s0x_profiles.company_city,z_region.center) as city,
          z_region.title AS region,
          z_user.email
        FROM
          `s0x_users`
          INNER JOIN `s0x_profiles`
            ON s0x_profiles.`user_id` = s0x_users.id
          INNER JOIN z_user
            ON z_user.id=s0x_profiles.user_id
          LEFT JOIN z_region
            ON z_region.id=s0x_profiles.region_id
        WHERE s0x_users.`group_id` = 9
        ';
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        $companyArr = array();
        echo count($result);
        echo "<br/>";
        foreach ($result as $r) {
            //CVarDumper::dump($r, 10, true);
            if (strlen(trim($r['company_name'])) < 2)
                $r['company_name'] = 'Компания ' . $r['user_id'];

            $companyArr[trim($r['company_name'])]['company'] = array(
                'title' => $r['company_name'],
                'region_id' => $r['region_id'],
                'city' => $r['city'],
                'region' => $r['region'],
                'address' => $r['address'],
                'egrpou' => $r['egrpou'],
                'email' => $r['email'],
            );
            $companyArr[trim($r['company_name'])]['users'][$r['user_id']] = $r;
        }


        /*$model=Companygroup::model()->findByAttributes(array('title'=>trim($r['company_name'])));
        if(!$model){
            $model=new Companygroup;
            $model->title=trim($r['company_name']);
            $model->status=3;
            $model->save();
        }*/
        //echo count($result);
        foreach ($companyArr as $group) {
            //echo $group['company']['title']."<br>";
            CVarDumper::dump($group, 10, true);

            $model = Companygroup::model()->findByAttributes(array('title' => trim($group['company']['title'])));
            if(!$model){
                $model=new Companygroup;
                $model->title=trim($group['company']['title']);
                $model->status=3;
                $model->save();
                if ($model->getErrors())

                    print_r($model->getErrors());

                if ($model->id) {

                    if (isset($group['users'])) {
                        $group['users'] = array_values($group['users']);
                        $CompanygroupUser = new CompanygroupUser;
                        $CompanygroupUser->companygroup_id = $model->id;
                        $CompanygroupUser->user_id = $group['users'][0]['user_id'];
                        $CompanygroupUser->status = 1;
                        $CompanygroupUser->save();
                        if ($CompanygroupUser->getErrors())
                            print_r($CompanygroupUser->getErrors());
                    }

                    #город
                    $city = City::model()->findByAttributes(array('title' => trim($group['company']['city']), 'region_id' => $group['company']['region_id']));
                    if (!$city)
                        $city = new City;
                    if (strlen(trim($group['company']['city'])) < 1 || !$group['company']['region_id']) {
                        $city->region_id = 9;
                        $city->id = 82;
                    } else {
                        $city->title = trim($group['company']['city']);
                        $city->region_id = $group['company']['region_id'];
                        $city->save();
                        if ($city->getErrors()) {
                            echo "city";
                            print_r($city->getErrors());
                        }
                    }

                    if ($group['company']['egrpou'] < 1)
                        $group['company']['egrpou'] = 0;

                    $model2 = new Company;
                    $model2->title = trim($group['company']['title']);
                    $model2->companygroup_id = $model->id;
                    $model2->city_id = $city->id;
                    $model2->egrpou = $group['company']['egrpou'];
                    $model2->address = $group['company']['address'];
                    $model2->status = 3;
                    $model2->save();
                    if ($model2->getErrors())
                        print_r($model2->getErrors());

                    if ($model2->id) {
                        #привязка компании
                        foreach ($group['users'] as $user) {
                            $CompanyUser = new CompanyUser;
                            $CompanyUser->company_id = $model2->id;
                            $CompanyUser->user_id = $user['user_id'];
                            $CompanyUser->status = 1;
                            $CompanyUser->companyrole_id = 2;
                            $CompanyUser->save();
                            if ($CompanyUser->getErrors())
                                print_r($CompanyUser->getErrors());

                        }
                    }

                }
            }

        }
    }
        public function actionMailtest(){
            die();
        #Подача заявки
        $users=User::model()->findAllByAttributes(array('status'=>1,'subscribe'=>1));
            echo count($users);
            echo '<br>';
            $cnt=0;
            foreach($users as $us){
                $cnt++;
                if($cnt<992)
                    continue;
            $body = Yii::app()->controller->renderPartial('/mail/newsub', array('user' => 123, 'company'=>123), true);
        //$body ='тестовая рассылка для всех';
        $message = new YiiMailMessage();
        $message->setBody($body, 'text/html');
        $message->setSubject('Вышла обновленная версия системы Zakupki-online.com');
            //if($us['email']=='dmitriy.bozhok@gmail.com'){
                $message->setTo($us['email']);
                $message->setFrom(array(
                    'support@zakupki-online.com' => 'Zakupki-Online.com'
                ));
                if(Yii::app()->mail->send($message)){

                    echo $cnt;
                    echo '<br>';
                }else{
                    echo $us['email'];
                    echo '<br>';
                }
            //}
        }
            echo $cnt;
        //CVarDumper::dump($companyArr, 10, true);
    }
    public function actionMailtest2(){
        $contr=Yii::app()->controller;
        $contr->layout="mail";
        $products=Purchase::model()->getNewPurchases();
        $productArr=array();
        foreach($products as $product){
            $productArr[$product['market_id']][$product['id']]=$product;
        }
        $userArr=array();
        if(count($productArr)>0){
            $users=User::model()->getUsersByMarket(array_keys($productArr));
            foreach($users as $u){
                $userArr[$u['id']]['email']=$u['email'];
                $userArr[$u['id']]['markets'][$u['market_id']]=$u['market_id'];
            }
            CVarDumper::dump($userArr,10,true);
        }

        $body=$contr->render('/mail/new_purchases',array('products'=>$products),true);
        //echo $body;

        /*$queue = new EmailQueue();
        $queue->to_email = 'dmitriy.bozhok@gmail.com';
        $queue->subject = "Mall Kids Are People Too, Damnit!";
        $queue->from_email = 'support@zakupki-online.com';
        $queue->from_name = 'Zakupki-online';
        $queue->date_published = new CDbExpression('NOW()');
        $queue->message = $body;
        $queue->save();*/
    }
    public function actionMailtest3(){
        $contr=Yii::app()->controller;
        $contr->layout="mail";
        $products=Purchase::model()->getNewPurchases();
        $productArr=array();
        foreach($products as $product){
            $productArr[$product['market_id']][$product['id']]=$product;
        }
        $userArr=array();
        if(count($productArr)>0){
            $users=User::model()->getUsersByMarket(array_keys($productArr));
            foreach($users as $u){
                $userArr[$u['id']]['email']=$u['email'];
                $userArr[$u['id']]['markets'][$u['market_id']]=$u['market_id'];
            }
            CVarDumper::dump($userArr,10,true);
        }


        //echo $body;
        foreach($userArr as $user){
        if($user['email']!='dmitriy.bozhok@gmail.com')
        continue;

            $body=$contr->render('/mail/group_admins',array('products'=>$products),true);
        echo $body;

       /* $queue = new EmailQueue();
        $queue->to_email = 'dmitriy.bozhok@gmail.com';
        $queue->subject = "Mall Kids Are People Too, Damnit!";
        $queue->from_email = 'support@zakupki-online.com';
        $queue->from_name = 'Zakupki-online';
        $queue->date_published = new CDbExpression('NOW()');
        $queue->message = $body;
        $queue->save();*/
        }
    }
    public function actionMailadmins(){
        die();
        $contr=Yii::app()->controller;
        $contr->layout="mail";
        $admins=User::model()->getGroupAdmins();

        foreach($admins as $user){
            /*if($user['email']!='dmitriy.bozhok@gmail.com')
                continue;*/
            $body=$contr->render('/mail/group_admins',array('user'=>$user),true);
            $queue = new EmailQueue();
            $queue->to_email = $user['email'];
            $queue->subject = "Вы назначены администратором в Zakupki-online.com";
            $queue->from_email = 'support@zakupki-online.com';
            $queue->attachfile = '/var/www/newzakupki/newzakupki.reactor.ua/upload/Zakupki_dlya_adminov.docx';
            $queue->from_name = 'Zakupki-online';
            $queue->date_published = new CDbExpression('NOW()');
            $queue->message = $body;
            $queue->save();
        }

        /*$contr=Yii::app()->controller;
        $contr->layout="mail";

        ///var/www/newzakupki2/newzakupki2.reactor.ua/upload/Zakupki_dlya_adminov.docx
        $body=$contr->render('/mail/group_admins',array('products'=>123),true);
        echo $body;*/
    }
    public function actionMailtest4(){
        $contr=Yii::app()->controller;
        $contr->layout="mail";

        ///var/www/newzakupki2/newzakupki2.reactor.ua/upload/Zakupki_dlya_adminov.docx
        $body=$contr->render('/mail/group_admins',array('products'=>123),true);
        echo $body;
    }
    public function actionMailnewpurchase(){
        $contr=Yii::app()->controller;
        $contr->layout="mail";
        $products=Purchase::model()->getNewPurchases();
        $productArr=array();
        foreach($products as $product){
            $productArr[$product['market_id']][$product['id']]=$product;
        }
        $userArr=array();
        if(count($productArr)>0){
            $users=User::model()->getUsersByMarket(array_keys($productArr));
            foreach($users as $u){
                $userArr[$u['id']]['email']=$u['email'];
                $userArr[$u['id']]['name']=$u['name'];
                $userArr[$u['id']]['markets'][$u['market_id']]=$u['market_id'];
            }
            CVarDumper::dump($userArr,10,true);
        }

        foreach($userArr as $user){
        $body=$contr->render('/mail/new_purchases',array('products'=>$productArr,'user'=>$user),true);
        echo $body;
        }

        /*$queue = new EmailQueue();
        $queue->to_email = 'dmitriy.bozhok@gmail.com';
        $queue->subject = "Mall Kids Are People Too, Damnit!";
        $queue->from_email = 'support@zakupki-online.com';
        $queue->from_name = 'Zakupki-online';
        $queue->date_published = new CDbExpression('NOW()');
        $queue->message = $body;
        $queue->save();*/
    }
    public function actionBrowser(){
        Yii::import('common.extensions.browser.*');
        $b = new EWebBrowser();
        $verArr=array();
        $version='';
        $allowed=array('Chrome'=>20,'Opera'=>10,'Firefox'=>20,'Mozilla'=>5,'Internet Explorer'=>9);
        if($b->browser=='Mozilla'){
            $verArr=explode('.',$b->version);
            $version=$verArr[0];
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {
                $version=11;
                $b->browser='Internet Explorer';
            }
        }else{
            $verArr=explode('.',$b->version);
            $version=$verArr[0];
        }
        if($allowed[$b->browser]>$version)
            echo 'update browser';

        /*

            echo '__toString<br>';
        echo $b;
        echo '<p></p>';
        echo '<h3>Testing properties now</h3>';
        echo 'user agent: '.$b->userAgent.'<br>';
        echo 'platform: '.$b->platform.'<br>';
        echo 'version: '.$b->version .'<br>'; */
        echo 'browser: '.$b->browser.'<br>';
        /*echo 'is Chrome? '.($b->browser == EWebBrowser::BROWSER_CHROME?'YES':'NO');*/
    }

    public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'common.components.ExportableGridBehavior',
                'filename' => 'Закупки.csv',
                'csvDelimiter' => ';', //i.e. Excel friendly csv delimiter
            ));
    }

    public function actionDisposition()
    {

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="your_name.xlsx"');
        header('Cache-Control: max-age=0');

        $connection = Yii::app()->db;
        $sql = '
        SELECT
          z_company_user.`company_id`
        FROM
          `z_company_user`
        WHERE z_company_user.`user_id`=:user_id
        ';
        $command = $connection->createCommand($sql);
        $command->bindParam(":user_id", yii::app()->user->getId(), PDO::PARAM_INT);
        $mycompanyArr = $command->queryColumn();
        $mycompanies=implode(',',$mycompanyArr);

        if(isset($_GET['year']))
            $year=$_GET['year'];
        else
            $year=date('Y');
        if(isset($_GET['month'])){
            $month=sprintf('%02d', $_GET['month']);
        }
        else
            $month=date('m');
        $sql='
        SELECT
        z_taggroup.id,
        z_taggroup.`title`,
        z_tag.`title` as tag,
        sum(z_offer.amount) AS amount,
        AVG(z_offer.delay) AS delay,
        /*MAX(z_offer.price) AS maxprice,
        MIN(z_offer.price) AS minprice,*/
        SUM(z_offer.price*z_offer.amount) AS total,
        SUM(z_offer.price*z_offer.amount)/sum(z_offer.amount) AS `avg_price`,
        COUNT(z_offer.id) AS cnt,
        z_company.id AS company_id,
        if(z_company.id in('.$mycompanies.'),z_company.title,"******") AS company,
        z_unit.title AS unit,
        z_offer.delivery AS delivery_id,
        if(z_offer.delivery,"C доставкой","Без доставки") AS delivery
        FROM
        z_taggroup
        INNER JOIN z_tag
          ON z_tag.taggroup_id = z_taggroup.id
        INNER JOIN z_offer
          ON z_offer.`tag_id`=z_tag.id AND z_offer.`winner`=1 AND z_offer.`exclude_lose`=0
        INNER JOIN z_product
          ON z_product.id=z_offer.`product_id`
        INNER JOIN z_purchase
          ON z_purchase.id=z_product.`purchase_id`
        INNER JOIN z_company
          ON z_company.id=z_purchase.`company_id`
        INNER JOIN z_unit
          ON z_unit.id=z_product.unit_id
        WHERE z_purchase.date_closed BETWEEN "'.$year.'-'.$month.'-01 00:00:00" AND "'.$year.'-'.$month.'-31 23:59:59"
        AND z_taggroup.id in(
                SELECT
                  z_tag.`taggroup_id`
                FROM
                  `z_company_user`
                  INNER JOIN z_purchase
                    ON z_purchase.`company_id` = z_company_user.`company_id`
                  INNER JOIN z_product
                    ON z_product.`purchase_id` = z_purchase.id
                  INNER JOIN z_offer
                    ON z_offer.`product_id` = z_product.id  AND z_offer.`winner`=1
                  INNER JOIN z_tag
                    ON z_tag.id = z_offer.`tag_id` AND z_tag.`taggroup_id`>0
                WHERE z_company_user.`user_id` = '.yii::app()->user->getId().' AND z_purchase.date_closed BETWEEN "'.$year.'-'.$month.'-01 00:00:00" AND "'.$year.'-'.$month.'-31 23:59:59"
                GROUP BY z_tag.`taggroup_id`
        )
        GROUP BY z_company.id,z_taggroup.id,z_offer.delivery
        ORDER BY z_taggroup.`title`,`avg_price` ASC
        /*LIMIT 0,10*/
        ';
        //echo $sql;
        //return;
        $data=Disposition::model()->findAllBySql($sql);

        if(intval($month)>1)
            $month=sprintf('%02d', intval($month)-1);
        else{
            $month=12;
            $year=$year-1;
        }

        $sql2='
        SELECT
        z_taggroup.id,
        z_taggroup.`title`,
        z_tag.`title` as tag,
        sum(z_offer.amount) AS amount,
        AVG(z_offer.delay) AS delay,
        /*MAX(z_offer.price) AS maxprice,
        MIN(z_offer.price) AS minprice,*/
        SUM(z_offer.price*z_offer.amount) AS total,
        SUM(z_offer.price*z_offer.amount)/sum(z_offer.amount) AS avg_price,
        COUNT(z_offer.id) AS cnt,
        z_company.id AS company_id,
        if(z_company.id in('.$mycompanies.'),z_company.title,"******") AS company,
        z_unit.title AS unit,
        z_offer.delivery AS delivery_id,
        if(z_offer.delivery,"C доставкой","Без доставки") AS delivery
        FROM
        z_taggroup
        INNER JOIN z_tag
          ON z_tag.taggroup_id = z_taggroup.id
        INNER JOIN z_offer
          ON z_offer.`tag_id`=z_tag.id AND z_offer.`winner`=1 AND z_offer.`exclude_lose`=0
        INNER JOIN z_product
          ON z_product.id=z_offer.`product_id`
        INNER JOIN z_purchase
          ON z_purchase.id=z_product.`purchase_id`
        INNER JOIN z_company
          ON z_company.id=z_purchase.`company_id`
        INNER JOIN z_unit
          ON z_unit.id=z_product.unit_id
        WHERE z_purchase.date_closed BETWEEN "'.$year.'-'.$month.'-01 00:00:00" AND "'.$year.'-'.$month.'-31 23:59:59"
        AND z_taggroup.id in(
                SELECT
                  z_tag.`taggroup_id`
                FROM
                  `z_company_user`
                  INNER JOIN z_purchase
                    ON z_purchase.`company_id` = z_company_user.`company_id`
                  INNER JOIN z_product
                    ON z_product.`purchase_id` = z_purchase.id
                  INNER JOIN z_offer
                    ON z_offer.`product_id` = z_product.id  AND z_offer.`winner`=1
                  INNER JOIN z_tag
                    ON z_tag.id = z_offer.`tag_id` AND z_tag.`taggroup_id`>0
                WHERE z_company_user.`user_id` = '.yii::app()->user->getId().' AND z_purchase.date_closed BETWEEN "'.$year.'-'.$month.'-01 00:00:00" AND "'.$year.'-'.$month.'-31 23:59:59"
                GROUP BY z_tag.`taggroup_id`
        )
        GROUP BY z_company.id,z_taggroup.id,z_offer.delivery
        ORDER BY z_taggroup.`title`,z_company.title
        /*LIMIT 0,1*/
        ';
        $data2=Disposition::model()->findAllBySql($sql2);

        $otherdata=array();
        foreach($data2 as $row){
            $otherdata[$row->id][$row->company_id][$row->delivery_id]=$row->avg_price;
        }

        Yii::import('frontend.vendors.phpexcel.PHPExcel', true);
        $phpexcel = new PHPExcel(); // Создаём объект PHPExcel
        $cellArr=array(
            'A'=>'id',
            'B'=>'title',
            'C'=>'company',
            'D'=>'unit',
            'E'=>'amount',
            'F'=>'avg_price',
            'G'=>'price_diff',
            'H'=>'delivery',
            'I'=>'delay'
        );
        $titleArr=array(
            'id'=>'id',
            'title'=>'Название',
            'company'=>'Компания',
            'unit'=>'Единицы',
            'amount'=>'Общий объем',
            'avg_price'=>'Средневзвешенная цена',
            'price_diff'=>'Изменение цены',
            'delivery'=>'Доставка',
            'delay'=>'Средняя отсрочка'
        );

        $cnt=0;
        $page = $phpexcel->setActiveSheetIndex(0); // Делаем активной первую страницу и получаем её

        foreach($cellArr as $alfa=>$cell)
            $page->setCellValue($alfa.'1', $titleArr[$cell]);

        $cnt++;
        $nameFirstCnt=null;
        $nameLastCnt=null;
        $nameFirst=null;
        $nameLast=null;
        foreach($data as $row){

            $cnt++;
            $page = $phpexcel->setActiveSheetIndex(0);
            foreach($cellArr as $alfa=>$cell)
            if($cell=='price_diff')
                if(isset($otherdata[$row['id']][$row['company_id']][$row['delivery_id']]))
                    $page->setCellValue($alfa.$cnt,number_format($row['avg_price']-$otherdata[$row['id']][$row['company_id']][$row['delivery_id']], 2, '.', ''));
                else
                    $page->setCellValue($alfa.$cnt,0);
            else
                $page->setCellValue($alfa.$cnt,$row[$cell]);

            if(!$nameFirst){
                $nameFirstCnt=$cnt;
                $nameFirst=$row['id'];
            }
            else{
                if($nameFirst!=$row['id']){
                    $nameLastCnt=$cnt-1;

                    #id
                    $phpexcel->getActiveSheet()->mergeCells('A'.$nameFirstCnt.':A'.$nameLastCnt);
                    $phpexcel->getActiveSheet()->getStyle('A'.$nameFirstCnt.':A'.$nameLastCnt)
                        ->getAlignment()
                        ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $nameFirst=null;

                    #title
                    $phpexcel->getActiveSheet()->mergeCells('B'.$nameFirstCnt.':B'.$nameLastCnt);
                    $phpexcel->getActiveSheet()->getStyle('B'.$nameFirstCnt.':B'.$nameLastCnt)
                        ->getAlignment()
                        ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $nameFirst=null;

                    #unit
                    $phpexcel->getActiveSheet()->mergeCells('D'.$nameFirstCnt.':D'.$nameLastCnt);
                    $phpexcel->getActiveSheet()->getStyle('D'.$nameFirstCnt.':D'.$nameLastCnt)
                        ->getAlignment()
                        ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                    $nameFirst=null;

                }
            }

        }
        if($nameFirst==$row['id']){

            #id
            $phpexcel->getActiveSheet()->mergeCells('A'.$nameFirstCnt.':A'.$cnt);
            $phpexcel->getActiveSheet()->getStyle('A'.$nameFirstCnt.':A'.$cnt)
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            #title
            $phpexcel->getActiveSheet()->mergeCells('D'.$nameFirstCnt.':D'.$cnt);
            $phpexcel->getActiveSheet()->getStyle('D'.$nameFirstCnt.':D'.$cnt)
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            #unit
            $phpexcel->getActiveSheet()->mergeCells('C'.$nameFirstCnt.':C'.$cnt);
            $phpexcel->getActiveSheet()->getStyle('C'.$nameFirstCnt.':C'.$cnt)
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        }

        $phpexcel->getActiveSheet()->getColumnDimension('A')
            ->setWidth('5');

        foreach(range('B','I') as $columnID) {
            $phpexcel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $page->setTitle("Test"); // Ставим заголовок "Test" на странице

        $objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');

        $objWriter->save('php://output');


    }
    public function actionExcel()
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="your_name.xls"');
        header('Cache-Control: max-age=0');

        Yii::import('frontend.vendors.phpexcel.PHPExcel', true);
        $phpexcel = new PHPExcel(); // Создаём объект PHPExcel
        /* Каждый раз делаем активной 1-ю страницу и получаем её, потом записываем в неё данные */
        $page = $phpexcel->setActiveSheetIndex(0); // Делаем активной первую страницу и получаем её
        $page->setCellValue("A1", "Hello"); // Добавляем в ячейку A1 слово "Hello"
        $page->setCellValue("A2", "World!"); // Добавляем в ячейку A2 слово "World!"
        $page->setCellValue("B1", "MyRusakov.ru"); // Добавляем в ячейку B1 слово "MyRusakov.ru"
        $page->setTitle("Test"); // Ставим заголовок "Test" на странице
        /* Начинаем готовиться к записи информации в xlsx-файл */
        $objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
        /* Записываем в файл */
        //$objWriter->save($_SERVER['DOCUMENT_ROOT']."/upload/content/test.xlsx");
        $objWriter->save('php://output');
    }
}