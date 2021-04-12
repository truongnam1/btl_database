
<?php
include "../back_end/branch.php";

// echo "<pre>";
// print_r(listBranches());
// echo "</pre>";
$list_branches = listBranches();

// trả về array chi nhánh tương ứng
function chiNhanh($khu_vuc)
{
    global $list_branches;
    $chi_nhanh = $list_branches[$khu_vuc];
    return $chi_nhanh;
}

// trả về array khu vực
function khuVuc()
{
    global $list_branches;
    $list_khu_vuc = array();
    $list_khu_vuc = array_keys($list_branches);
    return $list_khu_vuc;
}

function htmlOpitionKhuVuc($selectitem = 0)
{
    $htmlKhuVuc = '';
    foreach (khuVuc() as $key => $value) {
        if($selectitem == $key) {
            $htmlKhuVuc = $htmlKhuVuc . "<option value = \"$value\" selected>$value</option>";
        } else {
        $htmlKhuVuc = $htmlKhuVuc . "<option value = \"$value\">$value</option>";
        }
        // echo "day la chu";
    }

    return $htmlKhuVuc;
}

function htmlOptionChiNhanh($khu_vuc = 'all')
{
    global $list_branches;
    $chi_nhanh = '';
    if ($khu_vuc == 'all' || !array_key_exists($khu_vuc, $list_branches)) {
        foreach (khuVuc() as $kv) {
            foreach (chiNhanh($kv) as $branch) {
                $chi_nhanh = $chi_nhanh . "<option  value = \"$branch--$kv\">$branch</option>";
            }
        }
    } else {
        foreach (chiNhanh($khu_vuc) as $branch) {
            $chi_nhanh = $chi_nhanh . "<option  value = \"$branch--$khu_vuc\">$branch</option>";
        }
    }
    return $chi_nhanh;
}




// echo "ben duoi";
// echo "<pre>";
// echo '<div class="form-group col-md-8">
// <label for="inputBranch">Chi nhánh</label>
// <select id="inputBranch" class="form-control" name="inputBranch-down">
//   <option selected disabled hidden>---</option>
//   ';

// echo htmlOpitionKhuVuc();
// echo "<option>iph</option>
// </select>
// </div>";
// echo "</pre>";
?>