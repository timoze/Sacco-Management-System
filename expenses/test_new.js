var z = [["v1","v2","v3","v4","v5","v1","v2","v3","v4","v5"],["v8","v2","v3","v10","v5","v1","v2","v3","v4","v5"],["v9","v2","v3","v20","v5","v1","v2","v3","v4","v5"]];
var v1 = "";
var v1 = "";
var newArr = [];
var obj = {};
var finalobj = {};

for (let index = 0; index < z.length; index++) {
    // const element = z[index];
    newArr[index] = ({'name': z[index][0] ,'id': z[index][2] ,'type': z[index][3]});
   // newArr[index] = z[index][2];
  //  newArr[index] = z[index][3];
   // finalobj[index] = obj;
    
    //console.log(z[index][3]);
}
//newArr.push(finalobj);

console.log(newArr);