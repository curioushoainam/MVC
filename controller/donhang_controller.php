<?php 
class donhang_controller extends controller{
	function __construct(){
		$this->pathview = 'view/donhang/';
	}

	function cart(){		
		$cart = $_SESSION['cart'];
		$data = array(			
			'cart' => $cart
		);		
		$this->render('cart',$data);

	}

	function checkout(){	
		$dh_model = new donhang_model();
		$dh_model->setorder();
		
		if(isset($_SESSION['account']))
			$user = $dh_model->getUserInfo($_SESSION['account']);
		$user_id = isset($user->ma) ? $user->ma : '';
		$ho_ten = isset($user->ho_ten) ? $user->ho_ten : '';
		$dia_chi = isset($user->dia_chi) ? $user->dia_chi : '';
		$sdt = isset($user->sdt) ? $user->sdt : '';

		$data = array(
			'user_id'=>$user_id,			
			'ho_ten'=>$ho_ten,
			'dia_chi'=>$dia_chi,
			'sdt'=>$sdt
		);	
		$this->render('checkout',$data);
	}

	function preview(){			
		$cart = $_SESSION['cart'];
		$order = $_SESSION['order'];
		$account = $_SESSION['account'];
		$data = array(			
			'cart'=>$cart,
			'order'=>$order,
			'account'=>$account
		);	
		$this->render('preview',$data);
	}

	function invoice(){			

		$dh_model = new donhang_model();
		$invoice = $dh_model->getInvoice($_SESSION['account'], $_GET['orderID']);		

		$ma = isset($invoice->ma) ? $invoice->ma : '';
		$account = isset($invoice->account) ? $invoice->account : '';
		$orderID = isset($invoice->orderID) ? $invoice->orderID : '';
		$orderInfo = isset($invoice->orderInfo) ? $invoice->orderInfo : '';
		$cart = isset($invoice->cart) ? $invoice->cart : '';
		$amount = isset($invoice->amount) ? $invoice->amount : '';
		$paymentDue = isset($invoice->paymentDue) ? $invoice->paymentDue : '';
		$createdDate = isset($invoice->createdDate) ? $invoice->createdDate : '';

		$data = array(			
			'ma'=>$ma,
			'account'=>$account,
			'orderID'=>$orderID,
			'orderInfo'=>json_decode($orderInfo, 512),
			'cart'=>json_decode($cart, 512),
			'amount'=>$amount,
			'paymentDue'=>$paymentDue,
			'createdDate'=>$createdDate
		);

		$this->render('invoice',$data);
	}
}








?>