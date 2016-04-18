<?php
namespace CaT\InstILIAS;

require_once "./Services/Context/classes/class.ilContext.php";
require_once("./Services/Init/classes/class.ilInitialisation.php");
require_once("Services/AccessControl/classes/class.ilObjRoleTemplate.php");
require_once("Modules/OrgUnit/classes/class.ilObjOrgUnit.php");
require_once("Modules/Category/classes/class.ilObjCategory.php");

/**
* implementation of an ilias configurator
*
* @author Stefan Hecken <stefan.hecken@concepts-and-training.de>
*/

class IliasReleaseConfigurator implements \InstILIAS\interfaces\Configurator {
	
	public function __construct() {
		$this->initIlias();

		global $ilDB, $tree;

		$this->gDB = $ilDB;
		$this->gTree = $tree;
	}

	/**
	 * @inheritdoc
	 */
	public function initIlias() {
		ilContext::init(ilContext::CONTEXT_WEB_NOAUTH);
		ilInitialisation::initILIAS();
	}

	/**
	 * @inheritdoc
	 */
	public function createRoles($install_roles) {
		$newObj = new ilObjRoleTemplate();
		$newObj->setType("rolt");
		$newObj->setTitle("Pool Trainingsersteller");
		$newObj->setDescription("Rolle für die Ersteller von dezentralen Trainings");
		$newObj->create();
		$newObj->createReference();
		$newObj->putInTree(ROLE_FOLDER_ID);
		$newObj->setPermissions(ROLE_FOLDER_ID);

		$this->gDB->manipulate("INSERT INTO rbac_fa (rol_id, parent, assign, protected)"
			 ." VALUES ( ".$this->gDB->quote($newObj->getId(), "integer")
			 ."        , ".$this->gDB->quote(ROLE_FOLDER_ID, "integer")
			 ."        , 'n', 'y')"
			 );
	}

	/**
	 * @inheritdoc
	 */
	public function createOrgUnits($install_orgunits) {
		
		foreach ($install_orgunits->childs() as $key => $value) {
			$this->createOrgunit($value, ilObjOrgUnit::getRootOrgRefId());
		}
	}

	/**
	 * single OrgUnit and her childs created
	 * recursiv
	 *
	 * @param $org_unit
	 * @param int $parent_ref_id
	 */
	protected function createOrgUnit($org_unit, $parent_ref_id) {
		$orgu = new ilObjOrgUnit();
		$orgu->setTitle($org_unit->title());
		$orgu->create();
		$orgu->createReference();
		$orgu->update();

		$orgu->putInTree($parent_ref_id);
		$orgu->initDefaultRoles();

		foreach ($org_unit->childs() as $key => $value) {
			$this->createOrgUnit($value, $orgu->getRefId());
		}
	}

	/**
	 * @inheritdoc
	 */
	public function createCategories($install_categories) {
		foreach ($install_categories->childs() as $key => $value) {
			$this->createCategory($value, $this->gTree->getRootId());
		}
	}

	/**
	 * single Category and her childs created
	 * recursiv
	 *
	 * @param $category
	 * @param int $parent_ref_id
	 */
	protected function createCategory($category, $parent_ref_id) {
		$cat = new ilObjCategory();
		$cat->setTitle($category->title());
		$cat->create();
		$cat->createReference();
		$cat->update();

		$cat->putInTree($parent_ref_id);
		$cat->initDefaultRoles();

		foreach ($category->childs() as $key => $value) {
			$this->createCategory($value, $cat->getRefId());
		}
	}
}