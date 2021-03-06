<?php
/**
 * The index view file of doc module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     doc
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='featurebar'><strong><?php echo $lang->doclib->all?></strong></div>
<div id='libs'>
  <?php
  $libs = array();
  $libs['product'] = $products;
  $libs['project'] = $projects;
  $libs['custom']  = $customLibs;
  ?>
  <?php foreach ($libs as $libsName => $libs):?>
  <div class='libs'>
    <div class='libs-heading'>
      <?php if(common::hasPriv('doc', 'allLibs')):?>
      <a class='libs-heading-text' href='<?php echo inlink('allLibs', "type=$libsName"); ?>'>
        <?php echo $libsName == 'custom' ? $lang->doc->custom : $lang->doc->systemLibs[$libsName]?>
        <i class='icon icon-double-angle-right'></i>
      </a>
      <?php else: ?>
      <div class="text-libs-heading">
        <?php echo $libsName == 'custom' ? $lang->doc->custom : $lang->doc->systemLibs[$libsName]?>
      </div>
      <?php endif; ?>
      <i class='icon icon-collapse'></i>
    </div>
    <?php if($libsName === 'product'): ?>
      <?php foreach($libs as $product):?>
        <?php if(isset($subLibs['product'][$product->id])):?>
        <div class='libs-group-heading libs-product-heading'><i class='icon icon-cube-alt'></i> <strong><?php echo $product->name?></strong></div>
        <div class='libs-group clearfix'>
          <?php foreach($subLibs['product'][$product->id] as $libID => $libName):?>
          <?php
          if($libID == 'project')   $libLink = inlink('allLibs', "type=project&extra=product=$product->id");
          elseif($libID == 'files') $libLink = inlink('showFiles', "type=product&objectID=$product->id");
          else                      $libLink = inlink('browse', "libID=$libID");
          ?>
          <a class='lib' title='<?php echo $libName?>' href='<?php echo $libLink ?>'><?php echo $libName?></a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php elseif($libsName === 'project'): ?>
      <?php foreach($libs as $project):?>
        <?php if(isset($subLibs['project'][$project->id])):?>
        <div class='libs-group-heading libs-project-heading'><i class='icon icon-folder-close-alt'></i> <strong><?php echo $project->name?></strong></div>
        <div class='libs-group clearfix'>
          <?php foreach($subLibs['project'][$project->id] as $libID => $libName):?>
          <?php
          if($libID == 'files') $libLink = inlink('showFiles', "type=project&objectID=$project->id");
          else                  $libLink = inlink('browse', "libID=$libID");
          ?>
          <a class='lib' title='<?php echo $libName?>' href='<?php echo $libLink ?>'><?php echo $libName?></a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php else: ?>
      <div class='libs-group clearfix'>
      <?php foreach($libs as $libID => $libName):?>
        <a class='lib' title='<?php echo $libName?>' href='<?php echo inlink('browse', "libID=$libID") ?>'><?php echo $libName?></a>
      <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php endforeach; ?>
</div>
<?php include '../../common/view/footer.html.php';?>
