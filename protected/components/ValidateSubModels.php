<?php 
class ValidateSubModels extends CValidator {
	
	/* 
	 * @see CValidator::validateAttribute()
	 */
	protected function validateAttribute($object, $attribute) {
		$isValid = true;
		
		foreach ($object->$attribute as $k=>$model) {
			if(!$model->validate()){
				$isValid = false;
				$object->addError($attribute, $model->getErrors());
			}
		}
		
//		if($isValid && !$object->isNewRecord) {
//			foreach ($object->$attribute as $k=>$model) {
//				$model->character_id = $object->id;
//				$model->save();
//			}
//		}
	}

}
?>