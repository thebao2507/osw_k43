
		function chonLop(s1,s2)
		{
				var s1 = document.getElementById(s1);
				var s2 = document.getElementById(s2);
				s2.innerHTML = "";
				if(s1.value == "Công nghệ thông tin")
				{
					var mangLop = ["|Ngành","Công nghệ thông tin|Công nghệ thông tin","Sư phạm tin|Sư phạm tin"];
				}
				else if (s1.value == "Địa lý-Địa chính")
				{
					var mangLop = ["|Ngành","Sư phạm địa lý|Sư phạm địa lý","Quản lý tài nguyên - môi trường|Quản lý tài nguyên - môi trường"];
				}
				else if (s1.value == "GDTC-Quốc phòng")
				{
					var mangLop = ["|Ngành","GDTC-Quốc phòng|GDTC-Quốc phòng","Sư phạm thể dục|Sư phạm thể dục"];
				}
				else if (s1.value == "Giáo dục tiểu học-Mầm non")
				{
					var mangLop = ["|Ngành","Giáo dục tiểu học-Mầm non|Giáo dục tiểu học-Mầm non"];
				}
				else if (s1.value == "Giáo dục chính trị-QLNN")
				{
					var mangLop = ["|Ngành","Sư phạm GDCT|Sư phạm GDCT","Quản lý nhà nước|Quản lý nhà nước"];
				}
				else if(s1.value == "Hóa")
				{
					var mangLop = ["|Ngành","Sư phạm hóa|Sư phạm hóa","Tổng hợp hóa|Tổng hợp hóa","Công nghệ kỹ thuật hóa học|Công nghệ kỹ thuật hóa học"];
				}
				else if (s1.value == "Kinh tế-Kế toán")
				{
					var mangLop = ["|Ngành","Kinh tế|Kinh tế","Kế toán|Kế toán"];
				}
				else if (s1.value == "Kĩ thuật-Công nghệ")
				{
					var mangLop = ["|Ngành","Điện kỹ thuật|Điện kỹ thuật","Điện tử - viễn thông|Điện tử - viễn thông","Điện tử - tin học|Điện tử - tin học","Công nghệ KTXD|Công nghệ KTXD","Công nghệ môi trường|Công nghệ môi trường"];
				}
				else if (s1.value == "Lịch sử")
				{
					var mangLop = ["|Ngành","Sư phạm sử|Sư phạm sử","Tổng hợp sử|Tổng hợp sử"];
				}
				else if (s1.value == "Ngoại ngữ")
				{
					var mangLop = ["|Ngành","Sư phạm anh|Sư phạm anh","Ngôn ngữ anh|Ngôn ngữ anh"];
				}
				else if (s1.value == "Sinh-KTNN")
				{
					var mangLop = ["|Ngành","Sư phạm sinh|Sư phạm sinh","Sư phạm KTNN|Sư phạm KTNN","Sinh học|Sinh học","Nông học|Nông học"];
				}
				else if (s1.value == "TC-NH và QTKD")
				{
					var mangLop = ["|Ngành","Quản trị kinh doanh|Quản trị kinh doanh","Tài chính ngân hàng|Tài chính ngân hàng"];
				}
				else if (s1.value == "Tâm lý giáo dục-CTXH")
				{
					var mangLop = ["|Ngành","Tâm lý|Tâm lý","Quản lý giáo dục|Quản lý giáo dục","Công tác xã hội|Công tác xã hội"];
				}
				else if (s1.value == "Toán")
				{
					var mangLop = ["|Ngành","Sư phạm toán|Sư phạm toán","Tổng hợp toán|Tổng hợp toán"];
				}
				else if (s1.value == "Ngữ văn")
				{
					var mangLop = ["|Ngành","Sư phạm văn|Sư phạm văn","Tổng hợp văn|Tổng hợp văn","Việt Nam học|Việt Nam họa"];
				}
				else 
				{
					var mangLop = ["|Ngành","Sư phạm Lý-KTCN|Sư phạm Lý-KTCN","Sư phạm Lý|Sư phạm Lý","Tổng hợp Lý|Tổng hợp Lý","Sư phạm KTCN|Sư phạm KTCN"];
				}
				for(var i in mangLop)
				{
					var p = mangLop[i].split("|");
					var newLop = document.createElement("option");
					newLop.value = p[0];
					newLop.innerHTML = p[1];
					s2.options.add(newLop);
				}
			}
			