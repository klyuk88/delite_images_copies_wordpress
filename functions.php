## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'1536x1536',
		'2048x2048',
	] );
}

# Изменим максимально допустимый размер картинки по ширине/высоте
add_filter( 'big_image_size_threshold', function(){
	return 1600;
} );

# Отменим `-scaled` размер - ограничение максимального размера картинки
add_filter( 'big_image_size_threshold', '__return_zero' );


add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );
