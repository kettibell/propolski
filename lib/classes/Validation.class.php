<?
// Класс выладиции параметров: проверка на налл, длину, на соответствие шаблону
class Validation 
{
	static public $loginTmpl="/^[A-Za-z0-9А-Яа-я]{3,127}$/";
	static public $emailTmpl="/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
	static public $titleTmpl="/^[a-zA-Z0-9А-Яа-я_:-&\ \.]+$/";
	static public $passTmpl="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/";


	static public function checkFieldsByMatrixServer($matrix, $data){
		foreach ($data as $fieldName => $datavalue) {
			$checkres="";
				if (isset($matrix[$fieldName]["isNotNull"]) 
				&& $matrix[$fieldName]["isNotNull"] && ! self::checkEmpty($data[$fieldName])) {//если isNotNull=true &&  функция проверки пустоты дала false
						$checkres["status"]=false;
						$checkres["errText"]="Поле должно быть задано";
						return $checkres;
				}
				if (isset($matrix[$fieldName]["type"]) 
				&& ! gettype($data[$fieldName])==$matrix[$fieldName]["type"]) {//проверка на тип данных
						$checkres["status"]=false;
						$checkres["errText"]="Не верный тип данных. Ожидается: ".$matrix[$fieldName]["type"];
						return $checkres;
			    }
			    if (isset($matrix[$fieldName]["minLength"]) 
			    && ! self::checkMinLength($data[$fieldName], $matrix[$fieldName]["minLength"])) {//проверка на мин длину строки
						$checkres["status"]=false;
						$checkres["errText"]="Строка должна содержать минимум ".$matrix[$fieldName]["minLength"]." симв.";
						return $checkres;
			    }
			    if (isset($matrix[$fieldName]["maxLength"])
			     && ! self::checkMaxLength($data[$fieldName], $matrix[$fieldName]["maxLength"])) {//проверка на мин длину строки
						$checkres["status"]=false;
						$checkres["errText"]="Строка должна содержать максимум ".$matrix[$fieldName]["maxLength"]." симв.";
						return $checkres;
			    }
			    if (isset($matrix[$fieldName]["fpreg_match"])
			     && ! self::checkByPregMatch($data[$fieldName], $matrix[$fieldName]["fpreg_match"])) {//проверка по регулярке
						$checkres["status"]=false;
						$checkres["errText"]=(isset($matrix[$fieldName]["fpreg_matchText"])?$matrix[$fieldName]["fpreg_matchText"]:"Не валидная строка ";
						return $checkres;
			    }
		}
	}


	public function checkEmpty($data){
		return (!isset($data) || is_null($data) || $data==="")?false:true;
	}	
	public function checkMinLength($data, $min){
		return (iconv_strlen($data) <= $min)?false:true;
	}
	public function checkMaxLength($data, $max){
		return (iconv_strlen($data) >= $max)?false:true;
	}
	public function checkByPregMatch($data, fpreg_match){
		return (preg_match($fpreg_match, $login))?true: false;
	}



	static public function checkFieldsByMatrixFront($formId, $matrix, $data){
		$resCode="";
		$resCode.="$(document).ready(function() {
    				$('#".$formId."').bootstrapValidator({
				        framework: 'bootstrap',
				        icon: {
				            valid: 'glyphicon glyphicon-ok',
				            invalid: 'glyphicon glyphicon-remove',
				            validating: 'glyphicon glyphicon-refresh'
				        },
				        fields: {";
				        $isfirst=true;
						foreach ($data as $fieldName => $datavalue) {
						//	foreach ($matrix[$fieldName] as $settkey => $settvalue) {
							if ($isfirst) {
								$isfirst=false;
							} else {
								$resCode.=",";
							}
							$resCode.=$fieldName.": {";
								$resCode.="validators: {";
								$isFirstVal=true;
								if (isset($matrix[$fieldName]["isNotNull"]) && $matrix[$fieldName]["isNotNull"]) {
									$resCode.=($isFirstVal)?"":","; $isFirstVal=false;
									$resCode.="notEmpty: { message: 'Поле должно быть задано'}";
								}
								if (isset($matrix[$fieldName]["minLength"])  || isset($matrix[$fieldName]["maxLength"])) {
									$resCode.=($isFirstVal)?"":","; $isFirstVal=false;
									$resCode.="stringLength: {"
					                $resCode.=(isset($matrix[$fieldName]["minLength"]))?"min: ".$matrix[$fieldName]["minLength"].",":"";      
					                $resCode.=(isset($matrix[$fieldName]["maxLength"]))?"min: ".$matrix[$fieldName]["maxLength"].",":"";
					                $resCode.=" message: 'Поле должно быть больше 6 символов' }";
								}
								if (isset($matrix[$fieldName]["fpreg_match"])) {
									$resCode.=($isFirstVal)?"":","; $isFirstVal=false;
									$resCode.="regexp: {
                         					   	regexp: ".$matrix[$fieldName]["fpreg_match"].",
                        						message: '".((isset($matrix[$fieldName]["fpreg_matchText"])?$matrix[$fieldName]["fpreg_matchText"]:"Не валидная строка ")." '}";
								}
								$resCode.="}";	
							$resCode.="}";	
							//}
						}

		$resCode.="      }
    				});
				});";				

	}

// $(document).ready(function() {
//     $('#proc_autorize').bootstrapValidator({
//         framework: 'bootstrap',
//         icon: {
//             valid: 'glyphicon glyphicon-ok',
//             invalid: 'glyphicon glyphicon-remove',
//             validating: 'glyphicon glyphicon-refresh'
//         },
//         fields: {
//             email: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Поле должно быть задано'
//                     },
//                     stringLength: {
//                         min: 6,
//                         max: 127,
//                         message: 'Поле должно быть больше 6 символов'
//                     },
//                     regexp: {
//                         regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
//                         message: 'Поле должно содержать буквы, цифры, точку и подчеркивание'
//                     }
//                 }
//             },
//             password: {
//                 validators: {
//                     notEmpty: {
//                         message: 'Поле должно быть задано'
//                     },
//                     stringLength: {
//                         min: 8,
//                         max: 127,
//                         message: 'Поле должно быть больше 8 символов'
//                     },
//                     regexp: {
//                         regexp: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/,
//                         message: 'Поле должно содержать латинские буквы, цифры, спецсимволы '
//                     }
//                 }
//             }
//         }
//     });
// });



// ###########################################################################################################

// class Validation
// {

// 	public function checkAllFields($arr){
// 		if (count($arr) === 0) {
// 			return false;
// 		}
// 		// echo "arr ".var_dump($arr);
// 		foreach ($arr as $rule => $value) {
// 			// echo "<br> value (".$value.")";
// 			if (!self::checkEmpty($value) || !self::checkType($value) || !self::checkLength($value)) {

// 				return false;
// 			}
// 			switch ($rule) {
// 				case 'login':
// 					if (!self::checkLogin($value)) {
// 						return false;
// 					}
// 					break;
// 				case 'passwd':
// 					if (!self::checkPasswd($value)) {
// 						return false;
// 					}
// 					break;
// 				case 'email':
// 					if (!self::checkEmail($value)) {
// 						return false;
// 					}
// 					break;	
// 				case 'first_name':
// 					if (!self::checkFirst_name($value)) {
// 						return false;
// 					}
// 					break;	
// 				case 'last_name':
// 					if (!self::checkLast_name($value)) {					
// 						return false;
// 					}
// 					break;	
// 			}
// 		}
// 		return true;
// 	}

// 	public function checkType($data, $type="string"){
// 		if (gettype($data) == $type) {
// 			return true;
// 		}
// 		//echo "checkType".$data;
// 		return false;
// 	}

// 	public function checkEmpty($data){
// 		if ($data==="") {
// 			//echo "empty".$data;
// 			return false;
// 		}
// 		return true;
// 	}	

// 	public function checkLength($data, $min = 3, $max = 127){
// 		if (iconv_strlen($data) < $min || iconv_strlen($data) > $max) {
// 			// echo "checkLength ".$data;			
// 			return false;
// 		}
// 		return true;
// 	}

// 	public function checkLogin($login){
// 		if (preg_match('|^[\w]{3,127}$|', $login)) {
// 			return true;
// 		}	
// 	//	echo "checkLogin ".$login;	
// 		return false;
// 	}


// 	public function checkPasswd($passwd){
// 		if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/',$passwd) 
// 			//&& preg_match('|[A-Z]+|',$passwd) && preg_match('|[a-z]+|',$passwd)
// 			) {
// 			return true;
// 		}
// 		//echo "checkPasswd ".$passwd;	
// 		return false;
// 	}
// 	public function checkEmail($email){
// 		if (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',$email)) {
// 			return true;
// 		}
// 		//echo "checkEmail ".$email;
// 		return false;
// 	}

// 	public function checkFirst_name($first_name){
// 		// var_dump($first_name);
			
// 		if (preg_match('/^[\w]{3,127}$/', $first_name)) {
// 			return true;
// 		}	
// 	//	echo "checkLogin ".$login;	
// 		return false;
// 	}
// 	public function checkLast_name($last_name){
// 		if (preg_match('/^[\w]{3,127}$/', $last_name)) {
// 			return true;
// 		}	
// 	//	echo "checkLogin ".$login;	
// 		return false;
// 	}
// 	public function checkTel(){

// 	}
// 	public function checkText(){

// 	}
// 	public function checkFile(){

// 	}
// }
?>