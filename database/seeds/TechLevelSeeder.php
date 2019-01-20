<?php

use App\Label;
use App\TechCategory;
use Illuminate\Database\Seeder;

class TechLevelSeeder extends Seeder
{
    protected $techs = [
      ['PHP', 'http://blog.qiji.tech/wp-content/uploads/2016/07/test.jpg'],
      ['Angular', 'http://blog.qiji.tech/wp-content/uploads/2016/06/IMG_1402-96x96.jpg'],
      ['Node.js', 'http://blog.qiji.tech/wp-content/uploads/2016/01/avtor.png'],
      ['Laravel', 'http://blog.qiji.tech/wp-content/uploads/2016/02/face-96x96.png'],
      ['ThinkPHP', 'http://blog.qiji.tech/wp-content/uploads/2016/11/hdImg_ba829dcb679ded07e2fe8af0093044231475807458610.jpg']
    ];

    protected $labels = [
      ['html', 'http://blog.qiji.tech/wp-content/uploads/2016/02/QQ%E5%9B%BE%E7%89%8720160221111108-96x96.jpg'],
      ['php', 'http://blog.qiji.tech/wp-content/uploads/2016/02/msqq_炸弹人“可怜”表情图标_meitu_1.png'],
      ['angular', 'http://blog.qiji.tech/wp-content/uploads/2016/07/ic_default_avatar.png'],
      ['js', 'http://blog.qiji.tech/wp-content/uploads/2016/07/ic_default_avatar.png'],
      ['app sore', 'http://blog.qiji.tech/wp-content/uploads/2016/06/头像.png']
    ];

    public function run()
    {
      foreach ($this->techs as $value) {
        factory(TechCategory::class)->create([
          'name' => $value[0],
          'icon_url' => $value[1],
        ]);
      }

      foreach ($this->labels as $value) {
        factory(Label::class)->create([
          'name' => $value[0],
          'icon_url' => $value[1],
        ]);
      }
    }

}
