from famapy.core.discover import DiscoverMetamodels;

dm = DiscoverMetamodels()
result = dm.use_operation_from_file("Valid", "webspl.uvl")
print(result)