/**
 * Vasco Theme Admin Product Custom Fields JS
 * Handles adding/removing rows for Specifications and FAQ metaboxes in WP Admin
 *
 * @package VascoTheme
 */

(function ($) {
	'use strict';

	$(function () {
		// ── SPECS: Add Row ──────────────────────────────────────────────
		$(document).on('click', '#vasco-add-spec', function (e) {
			e.preventDefault();
			var $rows = $('#vasco-specs-rows');
			var idx = $rows.find('.vasco-spec-row').length;
			var html =
				'<tr class="vasco-spec-row">' +
				'<td style="padding:5px;border:1px solid #ddd;">' +
				'<input type="text" name="vasco_specs[' + idx + '][name]" value="" ' +
				'placeholder="VD: M\u00e0n h\u00ecnh, RAM, Pin..." ' +
				'style="width:100%;border:1px solid #ccc;border-radius:3px;padding:5px 7px;font-size:12px;" />' +
				'</td>' +
				'<td style="padding:5px;border:1px solid #ddd;">' +
				'<input type="text" name="vasco_specs[' + idx + '][value]" value="" ' +
				'placeholder="VD: TFT 3.54 inch, 3 GB, 2500 mAh..." ' +
				'style="width:100%;border:1px solid #ccc;border-radius:3px;padding:5px 7px;font-size:12px;" />' +
				'</td>' +
				'<td style="padding:5px;border:1px solid #ddd;text-align:center;">' +
				'<button type="button" class="vasco-remove-spec button" style="color:#a00;border-color:#a00;font-size:16px;line-height:1;padding:2px 7px;">\u00d7</button>' +
				'</td>' +
				'</tr>';
			$rows.append(html);
		});

		// ── SPECS: Remove Row ───────────────────────────────────────────
		$(document).on('click', '.vasco-remove-spec', function (e) {
			e.preventDefault();
			var $allRows = $('#vasco-specs-rows .vasco-spec-row');
			if ($allRows.length <= 1) {
				$(this).closest('tr').find('input').val('');
				return;
			}
			$(this).closest('tr.vasco-spec-row').remove();
			$('#vasco-specs-rows .vasco-spec-row').each(function (i) {
				$(this).find('input').eq(0).attr('name', 'vasco_specs[' + i + '][name]');
				$(this).find('input').eq(1).attr('name', 'vasco_specs[' + i + '][value]');
			});
		});

		// ── FAQ: Add Item ───────────────────────────────────────────────
		$(document).on('click', '#vasco-add-faq', function (e) {
			e.preventDefault();
			var $rows = $('#vasco-faq-rows');
			var idx = $rows.find('.vasco-faq-row').length;
			var html =
				'<div class="vasco-faq-row" style="border:1px solid #ddd;border-radius:5px;margin-bottom:8px;background:#fafafa;">' +
				'<div style="padding:8px 12px;border-bottom:1px solid #eee;display:flex;align-items:center;justify-content:space-between;">' +
				'<strong style="font-size:12px;color:#333;">C\u00e2u h\u1ecfi #' + (idx + 1) + '</strong>' +
				'<button type="button" class="vasco-remove-faq button" style="color:#a00;border-color:#a00;font-size:12px;">X\u00f3a</button>' +
				'</div>' +
				'<div style="padding:8px 12px;">' +
				'<label style="display:block;font-size:11px;font-weight:600;margin-bottom:3px;color:#555;">C\u00e2u h\u1ecfi:</label>' +
				'<input type="text" name="vasco_faq[' + idx + '][question]" value="" ' +
				'placeholder="VD: S\u1ea3n ph\u1ea9m c\u00f3 ho\u1ea1t \u0111\u1ed9ng kh\u00f4ng c\u1ea7n internet kh\u00f4ng?" ' +
				'style="width:100%;border:1px solid #ccc;border-radius:3px;padding:6px 8px;font-size:12px;margin-bottom:6px;" />' +
				'<label style="display:block;font-size:11px;font-weight:600;margin-bottom:3px;color:#555;">C\u00e2u tr\u1ea3 l\u1eddi:</label>' +
				'<textarea name="vasco_faq[' + idx + '][answer]" rows="3" ' +
				'placeholder="Nh\u1eadp c\u00e2u tr\u1ea3 l\u1eddi chi ti\u1ebft t\u1ea1i \u0111\u00e2y..." ' +
				'style="width:100%;border:1px solid #ccc;border-radius:3px;padding:6px 8px;font-size:12px;resize:vertical;"></textarea>' +
				'</div>' +
				'</div>';
			$rows.append(html);
		});

		// ── FAQ: Remove Item ────────────────────────────────────────────
		$(document).on('click', '.vasco-remove-faq', function (e) {
			e.preventDefault();
			var $allRows = $('#vasco-faq-rows .vasco-faq-row');
			if ($allRows.length <= 1) {
				$(this).closest('.vasco-faq-row').find('input, textarea').val('');
				return;
			}
			$(this).closest('.vasco-faq-row').remove();
			$('#vasco-faq-rows .vasco-faq-row').each(function (i) {
				$(this).find('strong').text('C\u00e2u h\u1ecfi #' + (i + 1));
				$(this).find('input').attr('name', 'vasco_faq[' + i + '][question]');
				$(this).find('textarea').attr('name', 'vasco_faq[' + i + '][answer]');
			});
		});
	});
})(jQuery);
