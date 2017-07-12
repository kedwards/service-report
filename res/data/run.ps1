$input_path = './service_state.json'
$output_file = './service_state_rendered.json'
$regex = '(\[[^\]]*\})'
select-string -Path $input_path -Pattern $regex -AllMatches | % { $_.Matches } | % { $_.Value } > $output_file