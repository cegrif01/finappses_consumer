<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	/**
	 * [objectify - when consuming api's, the results in the response can be difficult to work with 
	 * That's where this method comes in.]
	 * @param  [array] [description]
	 * @param  [array] [description]
	 * @return [stdObject] [description]
	 */
	protected function objectify(array $entity, $relations = array())
	{

		$objectified_output = [];

		if(! empty($relations)) {
			
			foreach($relations as $relation) {
				$objectified_output[$relation] = array_pull($entity, $relation);
				
			}

			foreach($objectified_output[$relation] as $value) {

				$objectified_output[$relation] = (object) $value;
			}

			pp($objectified_output);
		}

		//TODO take away the hardcoded value of user
		$objectified_output['user'] = (object) $entity;

		return $objectified_output;
	}

}