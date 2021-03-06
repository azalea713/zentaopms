<?php
/**
 * The createlib view of doc module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Jia Fu <fujia@cnezsoft.com>
 * @package     doc
 * @version     $Id: createlib.html.php 975 2010-07-29 03:30:25Z jajacn@126.com $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.lite.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<div id='titlebar'>
  <div class='heading'>
    <span class='prefix'><?php echo html::icon($lang->icons['doclib']);?></span>
    <strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->doc->createLib;?></strong>
  </div>
</div>
<div class='main'>
  <form method='post' target='hiddenwin' class='form-condensed' style='margin: 60px 0 115px 0'>
    <table class='table table-form'>
      <tr>
        <th class='w-80px'><?php echo $lang->doc->libType?></th>
        <td><?php echo html::select('libType', $lang->doc->libTypeList, 'product', "class='form-control'")?></td>
      </tr>
      <tr class='product'>
        <th><?php echo $lang->doc->product?></th>
        <td><?php echo html::select('product', $products, '', "class='form-control chosen'")?></td>
      </tr>
      <tr class='project hidden'>
        <th><?php echo $lang->doc->project?></th>
        <td><?php echo html::select('project', $projects, '', "class='form-control chosen'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->doclib->name?></th>
        <td><?php echo html::input('name', '', "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->doclib->control;?></th>
        <td>
          <div class='input-group'>
            <span class='input-group-addon'><?php echo $lang->doclib->acl?></span>
            <?php echo html::select('acl', $lang->doc->aclList, 'public', "class='form-control' onchange='toggleAcl(this.value)'")?>
          </div>
        </td>
      </tr>
      <tr id='whiteListBox' class='hidden'>
        <th><?php echo $lang->doc->whiteList;?></th>
        <td>
          <div class='input-group'>
            <span class='input-group-addon'><?php echo $lang->doclib->group?></span>
            <?php echo html::select('groups[]', $groups, '', "class='form-control chosen' multiple")?>
          </div>
          <div class='input-group'>
            <span class='input-group-addon'><?php echo $lang->doclib->user?></span>
            <?php echo html::select('users[]', $users, '', "class='form-control chosen' multiple")?>
          </div>
        </td>
      </tr>
      <tr>
        <td></td>
        <td class='text-center'><?php echo html::submitButton();?></td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.lite.html.php';?>
