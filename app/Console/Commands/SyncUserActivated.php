<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SyncUserActivated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'larabbs:sync-user-activated-at';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将用户最后登录时间从 Redis 同步到数据库中';

    /**
     * Execute the console command.
     *
     * @param User $user
     * @return void
     */
    public function handle(User $user): void
    {
        $user->syncUserActivatedAt();
        $this->info('同步成功！');
    }
}
