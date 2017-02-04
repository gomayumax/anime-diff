<?php

use Illuminate\Database\Seeder;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class AnimeListSeeder extends Seeder
{
  const CSV_FILENAME = '/database/seeder/csv/anime_list.csv';

  public function run()
  {
    $this->command->info('[Start] import data.');

    $config = new LexerConfig();
    // セパレーター指定、"\t"を指定すればtsvファイルとかも取り込めます
    $config->setDelimiter(",");
    $lexer = new Lexer($config);
    $interpreter = new Interpreter();
    $interpreter->addObserver(function(array $row) {
      // 各列のデータを取得
      $anime = $row[0];
      $link = $row[1];

      // 登録処理をここに書く
    });

    $lexer->parse(storage_path() . self::CSV_FILENAME, $interpreter);

    $this->command->info('[End] import data.');
  }
}
