<?php
/**
 * Wizard
 *
 * @link      https://aicode.cc/
 * @copyright 管宜尧 <mylxsw@aicode.cc>
 */

namespace App\Repositories;

/**
 * 项目目录
 *
 * @package App\Repositories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Repositories\Project[] $projects
 * @property-read \App\Repositories\User $user
 * @mixin \Eloquent
 * @property int $id
 * @property string $name 项目目录名称
 * @property int $sort_level 排序，排序值越大越靠后
 * @property int $user_id 创建用户ID
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Repositories\Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Repositories\Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Repositories\Catalog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Repositories\Catalog whereSortLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Repositories\Catalog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Repositories\Catalog whereUserId($value)
 */
class Catalog extends Repository
{
    protected $table = 'wz_project_catalogs';
    protected $fillable = [
        'name',
        'sort_level',
        'user_id',
    ];

    /**
     * 所属的用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * 目录下包含的项目
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}